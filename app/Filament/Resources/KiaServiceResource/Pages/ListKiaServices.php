<?php

namespace App\Filament\Resources\KiaServiceResource\Pages;

use App\Filament\Resources\KiaServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKiaServices extends ListRecords
{
    protected static string $resource = KiaServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
