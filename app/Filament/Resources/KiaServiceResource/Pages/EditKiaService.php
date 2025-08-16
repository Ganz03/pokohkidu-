<?php

namespace App\Filament\Resources\KiaServiceResource\Pages;

use App\Filament\Resources\KiaServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKiaService extends EditRecord
{
    protected static string $resource = KiaServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
