<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NurseryResource\Pages;
use App\Filament\Resources\NurseryResource\RelationManagers;
use App\Models\Nursery;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Component;

class NurseryResource extends Resource
{
    protected static ?string $model = Nursery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        TextInput::make('name'),
                    ]),
                Forms\Components\Section::make()
                    ->schema([
                        TextInput::make('address_line_1'),
                        TextInput::make('address_line_2'),
                        TextInput::make('town'),
                        TextInput::make('county'),
                        TextInput::make('postcode'),
                        TextInput::make('telephone'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('select')
                    ->action(function (Component $livewire, Model $record) {

                        $livewire->selectNursery($record);

                    })
            ])
            ->bulkActions([
                //
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
            'index'  => Pages\ListNurseries::route('/'),
            'create' => Pages\CreateNursery::route('/create'),
            'edit'   => Pages\EditNursery::route('/{record}/edit'),
        ];
    }
}
