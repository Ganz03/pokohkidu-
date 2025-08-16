<?php

namespace App\Filament\Resources\KkServiceResource\Pages;

use App\Filament\Resources\KkServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKkService extends EditRecord
{
    protected static string $resource = KkServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
