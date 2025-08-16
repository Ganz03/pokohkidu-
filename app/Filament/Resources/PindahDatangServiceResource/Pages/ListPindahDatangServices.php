<?php

namespace App\Filament\Resources\PindahDatangServiceResource\Pages;

use App\Filament\Resources\PindahDatangServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPindahDatangServices extends ListRecords
{
    protected static string $resource = PindahDatangServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
