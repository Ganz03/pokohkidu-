<?php
// app/Filament/Resources/LembagaDesaResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\LembagaDesaResource\Pages;
use App\Filament\Resources\LembagaDesaResource\RelationManagers;
use App\Models\LembagaDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;

class LembagaDesaResource extends Resource
{
    protected static ?string $model = LembagaDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Lembaga Desa';

    protected static ?string $modelLabel = 'Lembaga Desa';

    protected static ?string $pluralModelLabel = 'Lembaga Desa';

    protected static ?string $navigationGroup = 'Pemerintahan Desa';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Data Lembaga')
                    ->tabs([
                        Tabs\Tab::make('Informasi Dasar')
                            ->schema([
                                Section::make('Identitas Lembaga')
                                    ->schema([
                                        Forms\Components\TextInput::make('nama_lembaga')
                                            ->label('Nama Lembaga')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (string $context, $state, callable $set) => 
                                                $context === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null
                                            ),

                                        Forms\Components\TextInput::make('slug')
                                            ->label('Slug URL')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(LembagaDesa::class, 'slug', ignoreRecord: true)
                                            ->helperText('URL friendly nama lembaga (otomatis dibuat dari nama lembaga)'),

                                        Forms\Components\TextInput::make('singkatan')
                                            ->label('Singkatan')
                                            ->maxLength(20),

                                        Forms\Components\Textarea::make('dasar_hukum')
                                            ->label('Dasar Hukum / SK Pembentukan')
                                            ->rows(3),

                                        Forms\Components\Textarea::make('alamat_kantor')
                                            ->label('Alamat Kantor')
                                            ->rows(3),

                                        Forms\Components\FileUpload::make('logo_path')
                                            ->label('Logo Lembaga')
                                            ->image()
                                            ->directory('lembaga/logos')
                                            ->imageEditor()
                                            ->imageCropAspectRatio('1:1')
                                            ->imageResizeTargetWidth('300')
                                            ->imageResizeTargetHeight('300'),

                                        Forms\Components\FileUpload::make('foto_kantor_path')
                                            ->label('Foto Kantor')
                                            ->image()
                                            ->directory('lembaga/kantor')
                                            ->imageEditor(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tabs\Tab::make('Profil & Visi Misi')
                            ->schema([
                                Section::make('Profil Lembaga')
                                    ->schema([
                                        Forms\Components\RichEditor::make('profil')
                                            ->label('Profil Lembaga')
                                            ->columnSpanFull()
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'bulletList',
                                                'orderedList',
                                                'h2',
                                                'h3',
                                                'blockquote',
                                                'link',
                                            ]),
                                    ]),

                                Section::make('Visi & Misi')
                                    ->schema([
                                        Forms\Components\Textarea::make('visi')
                                            ->label('Visi')
                                            ->rows(4),

                                        Forms\Components\RichEditor::make('misi')
                                            ->label('Misi')
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'bulletList',
                                                'orderedList',
                                            ]),
                                    ])
                                    ->columns(1),
                            ]),

                        Tabs\Tab::make('Tugas & Fungsi')
                            ->schema([
                                Section::make('Tupoksi')
                                    ->schema([
                                        Forms\Components\RichEditor::make('tugas_pokok_fungsi')
                                            ->label('Tugas Pokok & Fungsi')
                                            ->columnSpanFull(),

                                        Forms\Components\RichEditor::make('hak')
                                            ->label('Hak')
                                            ->columnSpanFull(),

                                        Forms\Components\RichEditor::make('kewajiban')
                                            ->label('Kewajiban')
                                            ->columnSpanFull(),

                                        Forms\Components\RichEditor::make('tugas_wewenang')
                                            ->label('Tugas & Wewenang')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tabs\Tab::make('Galeri & Pengaturan')
                            ->schema([
                                Section::make('Galeri Foto')
                                    ->schema([
                                        Forms\Components\FileUpload::make('galeri_foto')
                                            ->label('Galeri Foto')
                                            ->image()
                                            ->multiple()
                                            ->directory('lembaga/galeri')
                                            ->imageEditor()
                                            ->maxFiles(10)
                                            ->helperText('Maksimal 10 foto'),
                                    ]),

                                Section::make('Pengaturan')
                                    ->schema([
                                        Forms\Components\Toggle::make('is_active')
                                            ->label('Status Aktif')
                                            ->default(true),

                                        Forms\Components\TextInput::make('urutan_tampil')
                                            ->label('Urutan Tampil')
                                            ->numeric()
                                            ->default(0)
                                            ->helperText('Semakin kecil angka, semakin awal tampil'),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_path')
                    ->label('Logo')
                    ->circular()
                    ->size(50),

                Tables\Columns\TextColumn::make('nama_lembaga')
                    ->label('Nama Lembaga')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('singkatan')
                    ->label('Singkatan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('pengurus_count')
                    ->label('Jumlah Pengurus')
                    ->counts('pengurus')
                    ->badge(),

                BooleanColumn::make('is_active')
                    ->label('Status'),

                Tables\Columns\TextColumn::make('urutan_tampil')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
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

    public static function getRelations(): array
    {
        return [
            RelationManagers\PengurusRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLembagaDesas::route('/'),
            'create' => Pages\CreateLembagaDesa::route('/create'),
            'edit' => Pages\EditLembagaDesa::route('/{record}/edit'),
        ];
    }
}