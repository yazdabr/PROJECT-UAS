<?php

namespace App\Filament\Resources\TransaksiemasResource\Pages;

use App\Filament\Resources\TransaksiemasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransaksiemas extends ListRecords
{
    protected static string $resource = TransaksiemasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
