<?php

namespace App\Filament\Nursery\Pages;

use App\Models\Nursery;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;


use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class SelectNursery extends Page implements Tables\Contracts\HasTable
{
    use InteractsWithTable;


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.nursery.pages.select-nursery';

    protected ?string $subheading = 'Please select a nursery to continue';

    public function table(Table $table): Table
    {
        return $table
            ->query(Nursery::query())
            ->columns([
                TextColumn::make('name'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Tables\Actions\Action::make('select')
                    ->action(function (Component $livewire, Model $record) {

                        $livewire->selectNursery($record);

                    })
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function selectNursery(Nursery $nursery)
    {

        session([
            'nursery_id'   => $nursery->id,
            'nursery_name' => $nursery->name
        ]);

        if (auth()->user()->role == 'Admin') {
            return redirect(route('filament.admin.pages.dashboard'));
        } else {
            return redirect(route('filament.nursery.home'));
        }

    }
}
