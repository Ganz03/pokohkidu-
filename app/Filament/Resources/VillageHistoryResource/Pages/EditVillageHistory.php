<?php

namespace App\Filament\Resources\VillageHistoryResource\Pages;

use App\Filament\Resources\VillageHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillageHistory extends EditRecord
{
    protected static string $resource = VillageHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
