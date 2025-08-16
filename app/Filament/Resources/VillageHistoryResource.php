<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillageHistoryResource\Pages;
use App\Models\VillageHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class VillageHistoryResource extends Resource
{
    protected static ?string $model = VillageHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Sejarah Desa';

    protected static ?string $modelLabel = 'Sejarah Desa';

    protected static ?string $pluralModelLabel = 'Sejarah Desa';

    protected static ?string $navigationGroup = 'Profil Desa';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->default('Sejarah Desa Pokoh Kidul')
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('introduction')
                            ->label('Pengantar')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'blockquote',
                            ])
                            ->placeholder('Masukkan pengantar sejarah desa')
                            ->helperText('Pengantar singkat tentang desa')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Asal Usul dan Sejarah Awal')
                    ->schema([
                        Forms\Components\RichEditor::make('origin_story')
                            ->label('Asal Usul Nama Desa')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'blockquote',
                            ])
                            ->placeholder('Ceritakan asal usul nama desa')
                            ->columnSpanFull(),
                    ]),

                Section::make('Peristiwa Bersejarah')
                    ->schema([
                        Forms\Components\RichEditor::make('pki_rebellion')
                            ->label('Peristiwa PKI 1965')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'blockquote',
                            ])
                            ->placeholder('Ceritakan peristiwa pemberontakan PKI')
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('reservoir_impact')
                            ->label('Dampak Waduk Gajah Mungkur')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'blockquote',
                            ])
                            ->placeholder('Ceritakan dampak pembangunan waduk')
                            ->columnSpanFull(),
                    ]),

                Section::make('Pemerintahan dan Budaya')
                    ->schema([
                        Forms\Components\RichEditor::make('government_history')
                            ->label('Sejarah Pemerintahan')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'blockquote',
                            ])
                            ->placeholder('Ceritakan sejarah pemerintahan dan kepala desa')
                            ->helperText('Gunakan numbered list untuk daftar kepala desa')
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('cultural_heritage')
                            ->label('Warisan Budaya')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'blockquote',
                            ])
                            ->placeholder('Ceritakan tentang kesenian dan budaya desa')
                            ->columnSpanFull(),
                    ]),

                Section::make('Informasi Tambahan')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('author')
                                    ->label('Penulis')
                                    ->placeholder('Nama penulis')
                                    ->columnSpan(1),

                                Forms\Components\Toggle::make('is_active')
                                    ->label('Status Aktif')
                                    ->helperText('Hanya satu sejarah desa yang dapat aktif dalam satu waktu')
                                    ->default(false)
                                    ->columnSpan(1),
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('introduction')
                    ->label('Pengantar')
                    ->html()
                    ->limit(80)
                    ->toggleable()
                    ->color('gray'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('Semua status')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif'),
            ])
            ->actions([
                Action::make('setActive')
                    ->label('Aktifkan')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (VillageHistory $record): bool => !$record->is_active)
                    ->requiresConfirmation()
                    ->modalHeading('Aktifkan Sejarah Desa')
                    ->modalDescription('Apakah Anda yakin ingin mengaktifkan sejarah desa ini? Sejarah desa yang sedang aktif akan dinonaktifkan.')
                    ->action(function (VillageHistory $record) {
                        $record->setAsActive();
                        
                        Notification::make()
                            ->title('Sejarah Desa berhasil diaktifkan')
                            ->success()
                            ->send();
                    }),

                Action::make('preview')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (): string => route('village-history.index'))
                    ->openUrlInNewTab()
                    ->visible(fn (VillageHistory $record): bool => $record->is_active),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Tables\Actions\DeleteAction $action, VillageHistory $record) {
                        // Don't allow deletion if this is the only active one
                        if ($record->is_active && VillageHistory::where('is_active', true)->count() == 1) {
                            Notification::make()
                                ->title('Tidak dapat menghapus')
                                ->body('Tidak dapat menghapus sejarah desa yang sedang aktif. Silakan aktifkan yang lain terlebih dahulu.')
                                ->danger()
                                ->send();
                            
                            $action->cancel();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Tables\Actions\DeleteBulkAction $action, $records) {
                            // Check if any active records are being deleted
                            $activeRecords = $records->where('is_active', true);
                            if ($activeRecords->count() > 0) {
                                Notification::make()
                                    ->title('Tidak dapat menghapus')
                                    ->body('Tidak dapat menghapus sejarah desa yang sedang aktif.')
                                    ->danger()
                                    ->send();
                                
                                $action->cancel();
                            }
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Belum ada sejarah desa')
            ->emptyStateDescription('Silakan buat sejarah desa baru.')
            ->emptyStateIcon('heroicon-o-book-open');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVillageHistories::route('/'),
            'create' => Pages\CreateVillageHistory::route('/create'),
            'edit' => Pages\EditVillageHistory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        $activeCount = static::getModel()::where('is_active', true)->count();
        return $activeCount > 0 ? (string) $activeCount : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getNavigationBadge() ? 'success' : 'gray';
    }
}