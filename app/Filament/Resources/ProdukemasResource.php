<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukemasResource\Pages;
use App\Models\Produkemas;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;


class ProdukemasResource extends Resource
{
    protected static ?string $model = Produkemas::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $pluralLabel = 'Produk Emas';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nama Produk'),
                TextInput::make('description')->label('Deskripsi')->maxLength(65535),
                TextInput::make('weight')->required()->numeric()->label('Berat (gram)'),
                TextInput::make('price')->required()->numeric()->label('Harga (per gram)'),
                FileUpload::make('photo')->image()->label('Foto Produk'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Produk')->searchable()->sortable(),
                TextColumn::make('weight')->label('Berat (gram)')->sortable(),
                TextColumn::make('price')->label('Harga (per gram)')->sortable(),
                TextColumn::make('description')->label('Deskripsi')->sortable(),
                ImageColumn::make('photo')->label('Foto Produk')->circular(),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
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
