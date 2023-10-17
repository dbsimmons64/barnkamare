<?php

namespace App\Filament\Resources\NurseryResource\Pages;

use App\Filament\Resources\NurseryResource;
use App\Models\Nursery;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;

class ListNurseries extends ListRecords
{
    protected static string $resource = NurseryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    
}
