<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MapResource\Pages;
use App\Models\Map;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MapResource extends Resource
{
    protected static ?string $model = Map::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationLabel = 'Peta & Infografis';
    protected static ?string $navigationGroup = 'Profil Desa';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Informasi Peta')
                ->schema([
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Peta')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => 
                                $context === 'create' ? $set('slug', Str::slug($state)) : null
                            ),
                        
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(Map::class, 'slug', ignoreRecord: true)
                            ->rules(['alpha_dash']),
                    ]),
                    
                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->rows(4)
                        ->columnSpanFull(),
                    
                    Forms\Components\TextInput::make('year')
                        ->label('Tahun Data')
                        ->numeric()
                        ->minValue(2000)
                        ->maxValue(date('Y') + 5)
                        ->default(date('Y')),
                ])
                ->columns(2),

            Section::make('Upload Peta')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('File Peta/Infografis')
                        ->image()
                        ->disk('public')
                        ->directory('maps')
                        ->preserveFilenames()
                        ->maxSize(5120) // 5MB
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                        ->imageResizeMode('contain')
                        ->imageResizeTargetWidth('1920')
                        ->imageResizeTargetHeight('1080')
                        ->required(),
                ])
                ->columns(1),

            Section::make('Pengaturan')
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Preview')
                    ->disk('public')
                    ->width(100)
                    ->height(70)
                    ->defaultImageUrl(asset('images/default-map.png')),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(80)
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                
                Tables\Columns\TextColumn::make('views')
                    ->label('Views')
                    ->sortable()
                    ->formatStateUsing(fn (int $state): string => number_format($state))
                    ->badge()
                    ->color('success'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif')
                    ->native(false),
                
                Tables\Filters\Filter::make('year')
                    ->form([
                        Forms\Components\TextInput::make('year_from')
                            ->label('Dari Tahun')
                            ->numeric(),
                        Forms\Components\TextInput::make('year_to')
                            ->label('Sampai Tahun')
                            ->numeric(),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['year_from'], fn($q) => $q->where('year', '>=', $data['year_from']))
                            ->when($data['year_to'], fn($q) => $q->where('year', '<=', $data['year_to']));
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn (Map $record): string => route('maps.show', $record->slug))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Map $record) {
                        if ($record->image) {
                            Storage::disk('public')->delete($record->image);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records) {
                            foreach ($records as $record) {
                                if ($record->image) {
                                    Storage::disk('public')->delete($record->image);
                                }
                            }
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaps::route('/'),
            'create' => Pages\CreateMap::route('/create'),
            'edit' => Pages\EditMap::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}