<?php

namespace App\Filament\Resources\ApbDesaResource\Pages;

use App\Filament\Resources\ApbDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApbDesas extends ListRecords
{
    protected static string $resource = ApbDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
