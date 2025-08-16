<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApbDesaResource\Pages;
use App\Models\ApbDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ApbDesaResource extends Resource
{
    protected static ?string $model = ApbDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    protected static ?string $navigationLabel = 'APBDesa';

    protected static ?string $modelLabel = 'APBDesa';

    protected static ?string $pluralModelLabel = 'APBDesa';

    protected static ?string $navigationGroup = 'Transparansi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => 
                                $context === 'create' ? $set('slug', Str::slug($state)) : null
                            ),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ApbDesa::class, 'slug', ignoreRecord: true),

                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto/Infografis')
                            ->image()
                            ->imageEditor()
                            ->directory('apbdesa')
                            ->visibility('public'),

                        Forms\Components\Textarea::make('excerpt')
                            ->label('Ringkasan')
                            ->rows(3),

                        Forms\Components\TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric()
                            ->required()
                            ->default(date('Y')),

                        Forms\Components\DatePicker::make('tanggal_publikasi')
                            ->label('Tanggal Publikasi')
                            ->required()
                            ->default(now()),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Dipublikasikan')
                            ->default(true),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('1. Pendapatan Desa')
                    ->schema([
                        Forms\Components\Fieldset::make('Pendapatan Asli Desa')
                            ->schema([
                                Forms\Components\TextInput::make('pad_hasil_usaha_rencana')
                                    ->label('Hasil Usaha - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('pad_hasil_usaha_realisasi')
                                    ->label('Hasil Usaha - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('pad_hasil_aset_rencana')
                                    ->label('Hasil Aset - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('pad_hasil_aset_realisasi')
                                    ->label('Hasil Aset - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('pad_swadaya_rencana')
                                    ->label('Swadaya, Partisipasi, Gotong Royong - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('pad_swadaya_realisasi')
                                    ->label('Swadaya, Partisipasi, Gotong Royong - Realisasi')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(2),

                        Forms\Components\Fieldset::make('Pendapatan Transfer')
                            ->schema([
                                Forms\Components\TextInput::make('transfer_dana_desa_rencana')
                                    ->label('Dana Desa - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_dana_desa_realisasi')
                                    ->label('Dana Desa - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_bagi_hasil_rencana')
                                    ->label('Bagi Hasil Pajak & Retribusi - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_bagi_hasil_realisasi')
                                    ->label('Bagi Hasil Pajak & Retribusi - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_alokasi_dana_rencana')
                                    ->label('Alokasi Dana Desa - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_alokasi_dana_realisasi')
                                    ->label('Alokasi Dana Desa - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_bantuan_kab_rencana')
                                    ->label('Bantuan Keuangan Kabupaten - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_bantuan_kab_realisasi')
                                    ->label('Bantuan Keuangan Kabupaten - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_bantuan_prov_rencana')
                                    ->label('Bantuan Keuangan Provinsi - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('transfer_bantuan_prov_realisasi')
                                    ->label('Bantuan Keuangan Provinsi - Realisasi')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(2),

                        Forms\Components\Fieldset::make('Pendapatan Lain-lain')
                            ->schema([
                                Forms\Components\TextInput::make('lain_hibah_rencana')
                                    ->label('Hibah - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('lain_hibah_realisasi')
                                    ->label('Hibah - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('lain_sumbangan_rencana')
                                    ->label('Sumbangan Pihak Ketiga - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('lain_sumbangan_realisasi')
                                    ->label('Sumbangan Pihak Ketiga - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('lain_pendapatan_rencana')
                                    ->label('Pendapatan Lain-lain - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('lain_pendapatan_realisasi')
                                    ->label('Pendapatan Lain-lain - Realisasi')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(2),
                    ]),

                Forms\Components\Section::make('2. Belanja Desa')
                    ->schema([
                        Forms\Components\TextInput::make('belanja_pemerintahan_rencana')
                            ->label('Penyelenggaraan Pemerintahan Desa - Rencana')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_pemerintahan_realisasi')
                            ->label('Penyelenggaraan Pemerintahan Desa - Realisasi')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_pembangunan_rencana')
                            ->label('Pelaksanaan Pembangunan Desa - Rencana')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_pembangunan_realisasi')
                            ->label('Pelaksanaan Pembangunan Desa - Realisasi')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_kemasyarakatan_rencana')
                            ->label('Pembinaan Kemasyarakatan Desa - Rencana')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_kemasyarakatan_realisasi')
                            ->label('Pembinaan Kemasyarakatan Desa - Realisasi')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_pemberdayaan_rencana')
                            ->label('Pemberdayaan Masyarakat Desa - Rencana')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_pemberdayaan_realisasi')
                            ->label('Pemberdayaan Masyarakat Desa - Realisasi')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_tak_terduga_rencana')
                            ->label('Belanja Tak Terduga - Rencana')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('belanja_tak_terduga_realisasi')
                            ->label('Belanja Tak Terduga - Realisasi')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('3. Pembiayaan Desa')
                    ->schema([
                        Forms\Components\Fieldset::make('Penerimaan Pembiayaan')
                            ->schema([
                                Forms\Components\TextInput::make('penerimaan_silpa_rencana')
                                    ->label('SiLPA - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('penerimaan_silpa_realisasi')
                                    ->label('SiLPA - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('penerimaan_dana_cadangan_rencana')
                                    ->label('Pencairan Dana Cadangan - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('penerimaan_dana_cadangan_realisasi')
                                    ->label('Pencairan Dana Cadangan - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('penerimaan_hasil_penjualan_rencana')
                                    ->label('Hasil Penjualan Kekayaan Desa - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('penerimaan_hasil_penjualan_realisasi')
                                    ->label('Hasil Penjualan Kekayaan Desa - Realisasi')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(2),

                        Forms\Components\Fieldset::make('Pengeluaran Pembiayaan')
                            ->schema([
                                Forms\Components\TextInput::make('pengeluaran_dana_cadangan_rencana')
                                    ->label('Pembentukan Dana Cadangan - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('pengeluaran_dana_cadangan_realisasi')
                                    ->label('Pembentukan Dana Cadangan - Realisasi')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('pengeluaran_modal_desa_rencana')
                                    ->label('Penyertaan Modal Desa - Rencana')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\TextInput::make('pengeluaran_modal_desa_realisasi')
                                    ->label('Penyertaan Modal Desa - Realisasi')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(50),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_publikasi')
                    ->label('Tanggal Publikasi')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_published')
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
                    ->options(fn () => ApbDesa::distinct()->pluck('tahun', 'tahun')->toArray()),
                
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi')
                    ->boolean()
                    ->trueLabel('Dipublikasikan')
                    ->falseLabel('Draft')
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
            'index' => Pages\ListApbDesas::route('/'),
            'create' => Pages\CreateApbDesa::route('/create'),
            'edit' => Pages\EditApbDesa::route('/{record}/edit'),
        ];
    }
}