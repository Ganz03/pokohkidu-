<?php

namespace App\Filament\Resources\OrganizationPositionResource\Pages;

use App\Filament\Resources\OrganizationPositionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganizationPositions extends ListRecords
{
    protected static string $resource = OrganizationPositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
