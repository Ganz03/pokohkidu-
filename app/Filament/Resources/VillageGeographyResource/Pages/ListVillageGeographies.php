<?php

namespace App\Filament\Resources\VillageGeographyResource\Pages;

use App\Filament\Resources\VillageGeographyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillageGeographies extends ListRecords
{
    protected static string $resource = VillageGeographyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
