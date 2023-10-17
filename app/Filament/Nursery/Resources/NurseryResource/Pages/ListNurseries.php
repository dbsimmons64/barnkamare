<?php

namespace App\Filament\Nursery\Resources\NurseryResource\Pages;

use App\Filament\Nursery\Resources\NurseryResource;
use App\Models\Nursery;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNurseries extends ListRecords
{
    protected static string $resource = NurseryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function selectNursery(Nursery $nursery)
    {

        session([
            'nursery_id'   => $nursery->id,
            'nursery_name' => $nursery->name
        ]);

        redirect(route('filament.nursery.home'));


    }
}
