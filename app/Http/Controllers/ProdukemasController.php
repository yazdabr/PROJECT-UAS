<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukemasResource\Pages;
use App\Models\Produkemas;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Resources\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;

class ProdukemasResource extends Resource
{
    protected static ?string $model = Produkemas::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('Nama Produk Emas'),
                Forms\Components\TextInput::make('price')->required()->numeric()->label('Harga'),
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('produkemas')
                    ->label('Foto Produk'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Produk Emas')->sortable(),
                TextColumn::make('price')->label('Harga')->sortable(),
                TextColumn::make('description')->label('Deskripsi')->sortable(),
                ImageColumn::make('photo')->label('Foto Produk')->circular()->size(100), // Display the image
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProdukemas::route('/'),
            'create' => Pages\CreateProdukemas::route('/create'),
            'edit' => Pages\EditProdukemas::route('/{record}/edit'),
        ];
    }
}
