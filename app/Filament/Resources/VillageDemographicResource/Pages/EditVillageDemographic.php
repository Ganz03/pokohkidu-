<?php

namespace App\Filament\Resources\VillageDemographicResource\Pages;

use App\Filament\Resources\VillageDemographicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillageDemographic extends EditRecord
{
    protected static string $resource = VillageDemographicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
