<?php

namespace App\Filament\Resources\NurseryResource\Pages;

use App\Filament\Resources\NurseryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNursery extends CreateRecord
{
    protected static string $resource = NurseryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['organisation_id'] = auth()->user()->organisation_id;

        return $data;
    }
}
