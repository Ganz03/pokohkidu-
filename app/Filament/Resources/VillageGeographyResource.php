<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillageGeographyResource\Pages;
use App\Models\VillageGeography;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class VillageGeographyResource extends Resource
{
    protected static ?string $model = VillageGeography::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'Geografis Desa';

    protected static ?string $modelLabel = 'Geografis Desa';

    protected static ?string $pluralModelLabel = 'Geografis Desa';

    protected static ?string $navigationGroup = 'Profil Desa';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Geografis')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->default('Geografis Desa Pokoh Kidul')
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('content')
                            ->label('Isi Konten')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'blockquote',
                                'table',
                                'h2',
                                'h3',
                            ])
                            ->placeholder('Masukkan konten geografis desa')
                            ->helperText('Anda dapat menambahkan tabel, list, dan formatting lainnya')
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->helperText('Hanya satu geografis desa yang dapat aktif dalam satu waktu')
                            ->default(false),
                    ])
                    ->columns(2),
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

                Tables\Columns\TextColumn::make('content')
                    ->label('Konten')
                    ->html()
                    ->limit(100)
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
                    ->visible(fn (VillageGeography $record): bool => !$record->is_active)
                    ->requiresConfirmation()
                    ->modalHeading('Aktifkan Geografis Desa')
                    ->modalDescription('Apakah Anda yakin ingin mengaktifkan geografis desa ini? Geografis desa yang sedang aktif akan dinonaktifkan.')
                    ->action(function (VillageGeography $record) {
                        $record->setAsActive();
                        
                        Notification::make()
                            ->title('Geografis Desa berhasil diaktifkan')
                            ->success()
                            ->send();
                    }),

                Action::make('preview')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (): string => route('village-geography.index'))
                    ->openUrlInNewTab()
                    ->visible(fn (VillageGeography $record): bool => $record->is_active),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Tables\Actions\DeleteAction $action, VillageGeography $record) {
                        if ($record->is_active && VillageGeography::where('is_active', true)->count() == 1) {
                            Notification::make()
                                ->title('Tidak dapat menghapus')
                                ->body('Tidak dapat menghapus geografis desa yang sedang aktif. Silakan aktifkan yang lain terlebih dahulu.')
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
                            $activeRecords = $records->where('is_active', true);
                            if ($activeRecords->count() > 0) {
                                Notification::make()
                                    ->title('Tidak dapat menghapus')
                                    ->body('Tidak dapat menghapus geografis desa yang sedang aktif.')
                                    ->danger()
                                    ->send();
                                
                                $action->cancel();
                            }
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Belum ada data geografis desa')
            ->emptyStateDescription('Silakan buat data geografis desa baru.')
            ->emptyStateIcon('heroicon-o-globe-alt');
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
            'index' => Pages\ListVillageGeographies::route('/'),
            'create' => Pages\CreateVillageGeography::route('/create'),
            'edit' => Pages\EditVillageGeography::route('/{record}/edit'),
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