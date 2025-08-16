<?php

namespace App\Filament\Resources;

use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Tentang Kami';
    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Halaman')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Halaman')
                            ->required(),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),

                Forms\Components\Section::make('Konten Tentang Kami')
                    ->schema([
                        Forms\Components\RichEditor::make('content')
                            ->label('Konten Utama')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Informasi Kantor')
                    ->schema([
                        Forms\Components\RichEditor::make('office_info')
                            ->label('Informasi Kantor')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                
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
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\AboutPageResource\Pages\ListAboutPages::route('/'),
            'create' => \App\Filament\Resources\AboutPageResource\Pages\CreateAboutPage::route('/create'),
            'edit' => \App\Filament\Resources\AboutPageResource\Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
