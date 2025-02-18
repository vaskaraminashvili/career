<?php

namespace App\Filament\Resources\VacancyResource\Pages;

use App\Filament\Resources\VacancyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVacancy extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = VacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
