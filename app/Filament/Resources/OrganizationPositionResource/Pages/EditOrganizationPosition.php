<?php

namespace App\Filament\Resources\OrganizationPositionResource\Pages;

use App\Filament\Resources\OrganizationPositionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganizationPosition extends EditRecord
{
    protected static string $resource = OrganizationPositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
