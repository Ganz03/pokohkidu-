<?php

namespace App\Filament\Resources\ApbDesaResource\Pages;

use App\Filament\Resources\ApbDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApbDesa extends EditRecord
{
    protected static string $resource = ApbDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
