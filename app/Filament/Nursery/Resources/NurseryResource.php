<?php

namespace App\Filament\Nursery\Resources;

use App\Filament\Nursery\Resources\NurseryResource\Pages;
use App\Filament\Nursery\Resources\NurseryResource\RelationManagers;
use App\Models\Nursery;
use Filament\Forms;
use Filament\Forms\Form;
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
    protected static ?string $navigationLabel = 'Change Nursery';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                
            ])
            ->columns([
                TextColumn::make('name'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('select')
                    ->action(function (Component $livewire, Model $record) {

                        $livewire->selectNursery($record);

                    })

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
            'index' => Pages\ListNurseries::route('/'),

        ];
    }
}
