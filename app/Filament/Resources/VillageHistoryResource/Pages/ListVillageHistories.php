<?php

namespace App\Filament\Resources\VillageHistoryResource\Pages;

use App\Filament\Resources\VillageHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillageHistories extends ListRecords
{
    protected static string $resource = VillageHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
