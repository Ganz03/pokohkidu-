<?php

namespace App\Filament\Resources\VillageGeographyResource\Pages;

use App\Filament\Resources\VillageGeographyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillageGeography extends EditRecord
{
    protected static string $resource = VillageGeographyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
