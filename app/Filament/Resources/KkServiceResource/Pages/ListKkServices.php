<?php

namespace App\Filament\Resources\KkServiceResource\Pages;

use App\Filament\Resources\KkServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKkServices extends ListRecords
{
    protected static string $resource = KkServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
