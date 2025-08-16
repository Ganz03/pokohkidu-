<?php

namespace App\Filament\Resources;

use App\Models\HeroContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroContentResource extends Resource
{
    protected static ?string $model = HeroContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Hero Section';
    protected static ?string $navigationGroup = 'Landing Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Utama')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Utama')
                            ->required()
                            ->placeholder('Selamat Datang di Desa Pokohkidul'),
                        
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Sub Judul')
                            ->required()
                            ->placeholder('Portal Resmi Pemerintah Desa'),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(4),
                    ]),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Utama')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Sub Judul'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\HeroContentResource\Pages\ListHeroContents::route('/'),
            'create' => \App\Filament\Resources\HeroContentResource\Pages\CreateHeroContent::route('/create'),
            'edit' => \App\Filament\Resources\HeroContentResource\Pages\EditHeroContent::route('/{record}/edit'),
        ];
    }
}
