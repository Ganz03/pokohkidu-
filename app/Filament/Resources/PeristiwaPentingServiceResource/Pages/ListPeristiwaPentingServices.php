<?php

namespace App\Filament\Resources\PeristiwaPentingServiceResource\Pages;

use App\Filament\Resources\PeristiwaPentingServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeristiwaPentingServices extends ListRecords
{
    protected static string $resource = PeristiwaPentingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
