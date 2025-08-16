<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PotensiDesaResource\Pages;
use App\Models\PotensiDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PotensiDesaResource extends Resource
{
    protected static ?string $model = PotensiDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationLabel = 'Potensi Desa';

    protected static ?string $modelLabel = 'Potensi Desa';

    protected static ?string $pluralModelLabel = 'Potensi Desa';

    protected static ?string $navigationGroup = 'Transparansi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric()
                            ->required()
                            ->default(date('Y')),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Potensi Penduduk')
                    ->schema([
                        Forms\Components\TextInput::make('jumlah_penduduk_laki')
                            ->label('Jumlah Penduduk Laki-laki')
                            ->numeric()
                            ->default(0),

                        Forms\Components\TextInput::make('jumlah_penduduk_perempuan')
                            ->label('Jumlah Penduduk Perempuan')
                            ->numeric()
                            ->default(0),

                        Forms\Components\TextInput::make('jumlah_kepala_keluarga')
                            ->label('Jumlah Kepala Keluarga')
                            ->numeric()
                            ->default(0),

                        Forms\Components\TextInput::make('kepadatan_penduduk')
                            ->label('Kepadatan Penduduk (per km²)')
                            ->numeric()
                            ->step(0.01)
                            ->default(0),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Potensi Wilayah')
                    ->schema([
                        Forms\Components\TextInput::make('luas_wilayah')
                            ->label('Luas Wilayah (km²)')
                            ->numeric()
                            ->step(0.01)
                            ->default(0),

                        Forms\Components\Textarea::make('batas_wilayah_utara')
                            ->label('Batas Wilayah Utara'),

                        Forms\Components\Textarea::make('batas_wilayah_selatan')
                            ->label('Batas Wilayah Selatan'),

                        Forms\Components\Textarea::make('batas_wilayah_timur')
                            ->label('Batas Wilayah Timur'),

                        Forms\Components\Textarea::make('batas_wilayah_barat')
                            ->label('Batas Wilayah Barat'),

                        Forms\Components\Textarea::make('orbitasi_desa')
                            ->label('Orbitasi Desa'),

                        Forms\Components\Repeater::make('jenis_lahan')
                            ->label('Jenis Lahan')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Jenis Lahan')
                                    ->required(),
                                Forms\Components\TextInput::make('luas')
                                    ->label('Luas (Ha)')
                                    ->numeric()
                                    ->step(0.01)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('potensi_wisata')
                            ->label('Potensi Wisata')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Sarana & Prasarana')
                    ->schema([
                        Forms\Components\Textarea::make('kantor_desa')
                            ->label('Kantor Desa'),

                        Forms\Components\Repeater::make('lembaga_pemerintahan')
                            ->label('Lembaga Pemerintahan')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Lembaga')
                                    ->required(),
                                Forms\Components\Textarea::make('keterangan')
                                    ->label('Keterangan'),
                            ])
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('sarana_prasarana_pkk')
                            ->label('Sarana & Prasarana PKK')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Sarana')
                                    ->required(),
                                Forms\Components\TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric(),
                                Forms\Components\Textarea::make('keterangan')
                                    ->label('Keterangan'),
                            ])
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('sarana_prasarana_pendidikan')
                            ->label('Sarana & Prasarana Pendidikan')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Sarana')
                                    ->required(),
                                Forms\Components\TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric(),
                                Forms\Components\Textarea::make('keterangan')
                                    ->label('Keterangan'),
                            ])
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('sarana_prasarana_peribadatan')
                            ->label('Sarana & Prasarana Peribadatan')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Sarana')
                                    ->required(),
                                Forms\Components\TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric(),
                                Forms\Components\Textarea::make('keterangan')
                                    ->label('Keterangan'),
                            ])
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('sarana_prasarana_kesehatan')
                            ->label('Sarana & Prasarana Kesehatan')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Sarana')
                                    ->required(),
                                Forms\Components\TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric(),
                                Forms\Components\Textarea::make('keterangan')
                                    ->label('Keterangan'),
                            ])
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('sarana_prasarana_air_bersih')
                            ->label('Sarana & Prasarana Air Bersih')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Sarana')
                                    ->required(),
                                Forms\Components\TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric(),
                                Forms\Components\Textarea::make('keterangan')
                                    ->label('Keterangan'),
                            ])
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('sarana_prasarana_irigasi')
                            ->label('Sarana & Prasarana Irigasi')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Sarana')
                                    ->required(),
                                Forms\Components\TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric(),
                                Forms\Components\Textarea::make('keterangan')
                                    ->label('Keterangan'),
                            ])
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_penduduk')
                    ->label('Total Penduduk')
                    ->getStateUsing(fn($record) => $record->formatNumber($record->total_penduduk)),

                Tables\Columns\TextColumn::make('jumlah_kepala_keluarga')
                    ->label('Jumlah KK')
                    ->getStateUsing(fn($record) => $record->formatNumber($record->jumlah_kepala_keluarga)),

                Tables\Columns\TextColumn::make('luas_wilayah')
                    ->label('Luas Wilayah (km²)')
                    ->getStateUsing(fn($record) => number_format($record->luas_wilayah, 2)),

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
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tahun')
                    ->label('Tahun')
                    ->options(fn () => PotensiDesa::distinct()->pluck('tahun', 'tahun')->toArray()),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif')
                    ->native(false),
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
            ->defaultSort('tahun', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPotensiDesas::route('/'),
            'create' => Pages\CreatePotensiDesa::route('/create'),
            'edit' => Pages\EditPotensiDesa::route('/{record}/edit'),
        ];
    }
}