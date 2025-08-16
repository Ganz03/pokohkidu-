<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisionMissionResource\Pages;
use App\Models\VisionMission;
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

class VisionMissionResource extends Resource
{
    protected static ?string $model = VisionMission::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';

    protected static ?string $navigationLabel = 'Visi Misi';

    protected static ?string $modelLabel = 'Visi Misi';

    protected static ?string $pluralModelLabel = 'Visi Misi';

    protected static ?string $navigationGroup = 'Profil Desa';

    protected static ?int $navigationSort = 2;

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
                            ->default('Visi Misi Desa')
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi/Pengantar')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'blockquote',
                                'codeBlock',
                            ])
                            ->placeholder('Masukkan deskripsi atau pengantar visi misi')
                            ->helperText('Deskripsi akan ditampilkan di bagian atas halaman sebagai pengantar')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Visi')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('vision_title')
                                    ->label('Judul Visi')
                                    ->placeholder('Visi')
                                    ->default('Visi')
                                    ->columnSpan(1),

                                Forms\Components\RichEditor::make('vision_content')
                                    ->label('Isi Visi')
                                    ->required()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                        'blockquote',
                                    ])
                                    ->placeholder('Masukkan isi visi desa')
                                    ->columnSpan(2),
                            ])
                    ]),

                Section::make('Misi')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('mission_title')
                                    ->label('Judul Misi')
                                    ->placeholder('Misi')
                                    ->default('Misi')
                                    ->columnSpan(1),

                                Forms\Components\RichEditor::make('mission_content')
                                    ->label('Isi Misi')
                                    ->required()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                        'blockquote',
                                    ])
                                    ->placeholder('Masukkan isi misi desa')
                                    ->helperText('Gunakan numbered list untuk membuat daftar misi yang terstruktur')
                                    ->columnSpan(2),
                            ])
                    ]),

                Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->helperText('Hanya satu visi misi yang dapat aktif dalam satu waktu')
                            ->default(false)
                            ->reactive()
                            ->afterStateUpdated(function ($state, $record) {
                                if ($state && $record) {
                                    // Deactivate others when this is activated
                                    VisionMission::where('id', '!=', $record->id)
                                        ->update(['is_active' => false]);
                                }
                            }),
                    ])
                    ->columns(1),
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

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
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
                    ->visible(fn (VisionMission $record): bool => !$record->is_active)
                    ->requiresConfirmation()
                    ->modalHeading('Aktifkan Visi Misi')
                    ->modalDescription('Apakah Anda yakin ingin mengaktifkan visi misi ini? Visi misi yang sedang aktif akan dinonaktifkan.')
                    ->action(function (VisionMission $record) {
                        $record->setAsActive();
                        
                        Notification::make()
                            ->title('Visi Misi berhasil diaktifkan')
                            ->success()
                            ->send();
                    }),

                Action::make('preview')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (): string => route('vision-mission.index'))
                    ->openUrlInNewTab()
                    ->visible(fn (VisionMission $record): bool => $record->is_active),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Tables\Actions\DeleteAction $action, VisionMission $record) {
                        // Don't allow deletion if this is the only active one
                        if ($record->is_active && VisionMission::where('is_active', true)->count() == 1) {
                            Notification::make()
                                ->title('Tidak dapat menghapus')
                                ->body('Tidak dapat menghapus visi misi yang sedang aktif. Silakan aktifkan yang lain terlebih dahulu.')
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
                                    ->body('Tidak dapat menghapus visi misi yang sedang aktif.')
                                    ->danger()
                                    ->send();
                                
                                $action->cancel();
                            }
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Belum ada visi misi')
            ->emptyStateDescription('Silakan buat visi misi baru untuk desa.')
            ->emptyStateIcon('heroicon-o-eye');
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
            'index' => Pages\ListVisionMissions::route('/'),
            'create' => Pages\CreateVisionMission::route('/create'),
            'edit' => Pages\EditVisionMission::route('/{record}/edit'),
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