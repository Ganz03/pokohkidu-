<?php

namespace App\Filament\Resources;

use App\Models\Monument;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class MonumentResource extends Resource
{
    protected static ?string $model = Monument::class;
    protected static ?string $navigationGroup = 'Landing Page';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Monumen')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Monumen')
                        ->required(),
                    
                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->required()
                        ->rows(3),
                    
                    Forms\Components\FileUpload::make('image')
                        ->label('Gambar Monumen')
                        ->image()
                        ->disk('public') // Gunakan disk public
                        ->directory('monuments') // Simpan di folder monuments
                        ->preserveFilenames()
                        ->maxSize(2048) // Max 2MB
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9'),
                    
                    Forms\Components\RichEditor::make('history')
                        ->label('Sejarah')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Pengaturan')
                ->schema([
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Tampilkan di Hero Section')
                        ->default(false),
                    
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square()
                    ->disk('public') // Konsisten dengan form
                    ->width(60)
                    ->height(60)
                    ->defaultImageUrl(asset('images/default-monument.png')), // Fallback image
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(function ($record) {
                        return $record->description;
                    }),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-star')
                    ->trueColor('warning')
                    ->falseColor('gray'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        // Hapus file gambar saat menghapus record
                        if ($record->image) {
                            Storage::disk('public')->delete($record->image);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->before(function ($records) {
                        // Hapus file gambar saat bulk delete
                        foreach ($records as $record) {
                            if ($record->image) {
                                Storage::disk('public')->delete($record->image);
                            }
                        }
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\MonumentResource\Pages\ListMonuments::route('/'),
            'create' => \App\Filament\Resources\MonumentResource\Pages\CreateMonument::route('/create'),
            'edit' => \App\Filament\Resources\MonumentResource\Pages\EditMonument::route('/{record}/edit'),
        ];
    }
}