<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonalResource\Pages;
use App\Filament\Resources\PersonalResource\RelationManagers;
use App\Models\Personal;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\FileUpload;


class PersonalResource extends Resource
{
    protected static ?string $model = Personal::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                TextInput::make('role')
                    ->required(),
                DatePicker::make('birthdate')
                    ->required(),
                TextInput::make('email')
                    ->required()
                    ->email(),
                TextInput::make('phone')
                    ->required(),
                TextInput::make('instagram')
                    ->label('Instagram Username'),
                FileUpload::make('image_path')
                    ->label('Photo')
                    ->image()
                    ->directory('personals') // Folder tempat penyimpanan di storage
                    ->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('image_path')
                ->label('Foto')
                ->size(50), // Ukuran gambar
            TextColumn::make('name')->label('Nama'),
            TextColumn::make('role')->label('Peran'),
            TextColumn::make('birthdate')->label('Tanggal Lahir'),
            TextColumn::make('email')->label('Email'),
            TextColumn::make('phone')->label('Telepon'),
            TextColumn::make('instagram')->label('Instagram'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPersonals::route('/'),
            'create' => Pages\CreatePersonal::route('/create'),
            'edit' => Pages\EditPersonal::route('/{record}/edit'),
        ];
    }
}
