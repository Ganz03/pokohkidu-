<?php

namespace App\Filament\Resources\PeristiwaPentingServiceResource\Pages;

use App\Filament\Resources\PeristiwaPentingServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeristiwaPentingService extends EditRecord
{
    protected static string $resource = PeristiwaPentingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
