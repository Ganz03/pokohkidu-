<?php
// app/Filament/Resources/OrganizationPositionResource.php
namespace App\Filament\Resources;

use App\Filament\Resources\OrganizationPositionResource\Pages;
use App\Models\OrganizationPosition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrganizationPositionResource extends Resource
{
    protected static ?string $model = OrganizationPosition::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Struktur Organisasi';
    protected static ?string $modelLabel = 'Jabatan';
    protected static ?string $pluralModelLabel = 'Jabatan';
    protected static ?string $navigationGroup = 'Pemerintahan Desa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Jabatan')
                    ->schema([
                        Forms\Components\TextInput::make('position_name')
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
                        
                        Forms\Components\TextInput::make('person_name')
                            ->label('Nama Pejabat')
                            ->required()
                            ->maxLength(255),
                    ]),

                Forms\Components\Section::make('Foto Pejabat')
                    ->schema([
                        Forms\Components\FileUpload::make('photo_path')
                            ->label('Foto')
                            ->directory('organization')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                                '4:5',
                            ])
                            ->maxSize(2048),
                    ]),

                Forms\Components\Section::make('Tugas dan Tanggung Jawab')
                    ->schema([
                        Forms\Components\RichEditor::make('duties')
                            ->label('Kedudukan, Tugas & Fungsi')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ]),
                        
                        Forms\Components\RichEditor::make('authorities')
                            ->label('Wewenang')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ]),
                        
                        Forms\Components\RichEditor::make('rights')
                            ->label('Hak')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ]),
                        
                        Forms\Components\RichEditor::make('obligations')
                            ->label('Kewajiban')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ]),
                    ]),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0),
                        
                        Forms\Components\Toggle::make('is_active')
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
                Tables\Columns\ImageColumn::make('photo_path')
                    ->label('Foto')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('position_name')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('person_name')
                    ->label('Nama Pejabat')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizationPositions::route('/'),
            'create' => Pages\CreateOrganizationPosition::route('/create'),
            'edit' => Pages\EditOrganizationPosition::route('/{record}/edit'),
        ];
    }
}