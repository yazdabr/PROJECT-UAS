<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiemasResource\Pages;
use App\Models\Transaksiemas;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;  // Correct import
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;  // Add DatePicker for date fields
use Filament\Tables\Columns\TextColumn;  // Corrected import
use Filament\Tables\Columns\ImageColumn;  // Corrected import

class TransaksiemasResource extends Resource
{
    protected static ?string $model = Transaksiemas::class;
    protected static ?string $navigationIcon = 'heroicon-o-document'; // Updated icon
    protected static ?string $pluralLabel = 'Transaksi Emas';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('produkemas_id')
                    ->relationship('produkemas', 'name')
                    ->required()
                    ->label('Produk Emas'),
                Select::make('personal_id')
                    ->relationship('personal', 'name')
                    ->required()
                    ->label('Personal'),
                TextInput::make('quantity')->required()->numeric()->label('Jumlah (gram)'),
                TextInput::make('total_price')->required()->numeric()->label('Total Harga'),
                DatePicker::make('transaction_date')  // Use DatePicker for date field
                    ->required()
                    ->label('Tanggal Transaksi'),
                FileUpload::make('transaction_photo')->image()->label('Bukti Transaksi'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('produkemas.name')->label('Produk Emas')->searchable()->sortable(),
                TextColumn::make('personal.name')->label('Personal')->searchable()->sortable(),
                TextColumn::make('quantity')->label('Jumlah (gram)')->sortable(),
                TextColumn::make('total_price')->label('Total Harga')->sortable(),
                TextColumn::make('transaction_date')->label('Tanggal Transaksi')->sortable(),
                ImageColumn::make('transaction_photo')->label('Bukti Transaksi')->circular(),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksiemas::route('/'),
            'create' => Pages\CreateTransaksiemas::route('/create'),
            'edit' => Pages\EditTransaksiemas::route('/{record}/edit'),
        ];
    }
}
