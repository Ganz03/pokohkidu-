<?php

namespace App\Filament\Resources;

use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Agenda Kegiatan';
    protected static ?string $navigationGroup = 'Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kegiatan')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Kegiatan')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(3),
                        
                        Forms\Components\TextInput::make('location')
                            ->label('Lokasi')
                            ->required(),
                        
                        Forms\Components\TextInput::make('organizer')
                            ->label('Penyelenggara'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Konten')
                    ->schema([
                        Forms\Components\RichEditor::make('content')
                            ->label('Detail Kegiatan')
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->directory('events')
                            ->preserveFilenames(),
                    ]),

                Forms\Components\Section::make('Waktu & Status')
                    ->schema([
                        Forms\Components\DateTimePicker::make('event_date')
                            ->label('Tanggal Mulai')
                            ->required(),
                        
                        Forms\Components\DateTimePicker::make('end_date')
                            ->label('Tanggal Selesai'),
                        
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'scheduled' => 'Terjadwal',
                                'ongoing' => 'Berlangsung',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Kegiatan')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi'),
                
                Tables\Columns\TextColumn::make('event_date')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'scheduled' => 'warning',
                        'ongoing' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    }),
                
                Tables\Columns\TextColumn::make('organizer')
                    ->label('Penyelenggara'),
                
                Tables\Columns\TextColumn::make('views')
                    ->label('Dilihat')
                    ->numeric(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('event_date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\EventResource\Pages\ListEvents::route('/'),
            'create' => \App\Filament\Resources\EventResource\Pages\CreateEvent::route('/create'),
            'edit' => \App\Filament\Resources\EventResource\Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}