<?php
// app/Filament/Resources/PerangkatDesaResource.php
namespace App\Filament\Resources;

use App\Filament\Resources\PerangkatDesaResource\Pages;
use App\Models\PerangkatDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PerangkatDesaResource extends Resource
{
    protected static ?string $model = PerangkatDesa::class;
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'Perangkat Desa';
    protected static ?string $modelLabel = 'Perangkat Desa';
    protected static ?string $pluralModelLabel = 'Perangkat Desa';
    protected static ?string $navigationGroup = 'Pemerintahan Desa';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Jabatan')
                    ->schema([
                        Forms\Components\TextInput::make('nama_jabatan')
                            ->label('Nama Jabatan')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', \Illuminate\Support\Str::slug($state))),
                        
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->disabled()
                            ->dehydrated(),
                        
                        Forms\Components\TextInput::make('nama_pejabat')
                            ->label('Nama Pejabat')
                            ->maxLength(255),
                            
                        Forms\Components\TextInput::make('nip')
                            ->label('NIP')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Foto Pejabat')
                    ->schema([
                        Forms\Components\FileUpload::make('foto_path')
                            ->label('Foto')
                            ->directory('perangkat-desa')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '3:4',
                                '1:1',
                            ])
                            ->maxSize(2048)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Informasi Tambahan')
                    ->schema([
                        Forms\Components\TextInput::make('pendidikan')
                            ->label('Pendidikan Terakhir')
                            ->maxLength(255),
                            
                        Forms\Components\DatePicker::make('tanggal_mulai_jabatan')
                            ->label('Tanggal Mulai Menjabat')
                            ->displayFormat('d/m/Y'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tugas dan Tanggung Jawab')
                    ->schema([
                        Forms\Components\RichEditor::make('tugas_fungsi')
                            ->label('Kedudukan, Tugas & Fungsi')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ])
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('wewenang')
                            ->label('Wewenang')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ])
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('hak')
                            ->label('Hak')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ])
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('kewajiban')
                            ->label('Kewajiban')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ])
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\TextInput::make('urutan_tampil')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0),
                        
                        Forms\Components\Toggle::make('is_aktif')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_path')
                    ->label('Foto')
                    ->circular()
                    ->size(50),
                
                Tables\Columns\TextColumn::make('nama_jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('nama_pejabat')
                    ->label('Nama Pejabat')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Belum diisi'),
                
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable()
                    ->placeholder('Belum diisi')
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('pendidikan')
                    ->label('Pendidikan')
                    ->placeholder('Belum diisi')
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('tanggal_mulai_jabatan')
                    ->label('Mulai Menjabat')
                    ->date('d/m/Y')
                    ->placeholder('Belum diisi')
                    ->toggleable(),
                
                Tables\Columns\IconColumn::make('is_aktif')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                
                Tables\Columns\TextColumn::make('urutan_tampil')
                    ->label('Urutan')
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_aktif')
                    ->label('Status'),
                    
                Tables\Filters\Filter::make('has_pejabat')
                    ->label('Jabatan Terisi')
                    ->query(fn ($query) => $query->whereNotNull('nama_pejabat')->where('nama_pejabat', '!=', '')),
                    
                Tables\Filters\Filter::make('has_photo')
                    ->label('Memiliki Foto')
                    ->query(fn ($query) => $query->whereNotNull('foto_path')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('urutan_tampil');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPerangkatDesas::route('/'),
            'create' => Pages\CreatePerangkatDesa::route('/create'),
            'edit' => Pages\EditPerangkatDesa::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::aktif()->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }
}