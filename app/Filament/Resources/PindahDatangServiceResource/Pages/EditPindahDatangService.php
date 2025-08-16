<?php

namespace App\Filament\Resources\PindahDatangServiceResource\Pages;

use App\Filament\Resources\PindahDatangServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPindahDatangService extends EditRecord
{
    protected static string $resource = PindahDatangServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
