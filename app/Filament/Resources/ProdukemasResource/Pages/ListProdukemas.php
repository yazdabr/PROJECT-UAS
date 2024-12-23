<?php

namespace App\Filament\Resources\ProdukemasResource\Pages;

use App\Filament\Resources\ProdukemasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdukemas extends ListRecords
{
    protected static string $resource = ProdukemasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
