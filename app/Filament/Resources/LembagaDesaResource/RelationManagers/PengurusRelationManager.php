<?php
// app/Filament/Resources/LembagaDesaResource/RelationManagers/PengurusRelationManager.php

namespace App\Filament\Resources\LembagaDesaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;

class PengurusRelationManager extends RelationManager
{
    protected static string $relationship = 'pengurus';

    protected static ?string $title = 'Pengurus Lembaga';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Pengurus')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('pendidikan')
                            ->label('Pendidikan Terakhir')
                            ->options([
                                'SD' => 'SD',
                                'SLTP' => 'SLTP/SMP',
                                'SLTA' => 'SLTA/SMA/SMK',
                                'D1' => 'Diploma 1',
                                'D2' => 'Diploma 2',
                                'D3' => 'Diploma 3',
                                'D4' => 'Diploma 4',
                                'S1' => 'Sarjana (S1)',
                                'S2' => 'Magister (S2)',
                                'S3' => 'Doktor (S3)',
                            ])
                            ->searchable(),

                        Forms\Components\TextInput::make('nip')
                            ->label('NIP')
                            ->maxLength(30),

                        Forms\Components\DatePicker::make('tanggal_mulai_jabatan')
                            ->label('Tanggal Mulai Jabatan'),

                        Forms\Components\DatePicker::make('tanggal_berakhir_jabatan')
                            ->label('Tanggal Berakhir Jabatan')
                            ->helperText('Kosongkan jika masih aktif'),

                        Forms\Components\FileUpload::make('foto_path')
                            ->label('Foto')
                            ->image()
                            ->directory('pengurus')
                            ->imageEditor()
                            ->imageCropAspectRatio('3:4')
                            ->imageResizeTargetWidth('300')
                            ->imageResizeTargetHeight('400'),

                        Forms\Components\Textarea::make('biodata')
                            ->label('Biodata Singkat')
                            ->rows(4)
                            ->columnSpanFull(),

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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                ImageColumn::make('foto_path')
                    ->label('Foto')
                    ->circular()
                    ->size(50),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('pendidikan')
                    ->label('Pendidikan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'S3' => 'success',
                        'S2' => 'info',
                        'S1' => 'primary',
                        'D4', 'D3', 'D2', 'D1' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('tanggal_mulai_jabatan')
                    ->label('Mulai Jabatan')
                    ->date()
                    ->sortable(),

                BooleanColumn::make('is_active')
                    ->label('Status'),

                Tables\Columns\TextColumn::make('urutan_tampil')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
                Tables\Filters\SelectFilter::make('pendidikan')
                    ->options([
                        'SD' => 'SD',
                        'SLTP' => 'SLTP/SMP',
                        'SLTA' => 'SLTA/SMA/SMK',
                        'D1' => 'Diploma 1',
                        'D2' => 'Diploma 2',
                        'D3' => 'Diploma 3',
                        'D4' => 'Diploma 4',
                        'S1' => 'Sarjana (S1)',
                        'S2' => 'Magister (S2)',
                        'S3' => 'Doktor (S3)',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}