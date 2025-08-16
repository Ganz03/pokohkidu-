<?php

namespace App\Filament\Resources\KtpServiceResource\Pages;

use App\Filament\Resources\KtpServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKtpService extends EditRecord
{
    protected static string $resource = KtpServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
