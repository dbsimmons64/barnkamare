<?php

namespace App\Filament\Resources\FamilyResource\Pages;

use App\Filament\Resources\FamilyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFamily extends CreateRecord
{
    protected static string $resource = FamilyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['nursery_id'] = session('nursery_id');

        return $data;
    }
}
