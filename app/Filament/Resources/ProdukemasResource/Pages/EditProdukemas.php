<?php

namespace App\Filament\Resources\ProdukemasResource\Pages;

use App\Filament\Resources\ProdukemasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;


class EditProdukemas extends EditRecord
{
    protected static string $resource = ProdukemasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
