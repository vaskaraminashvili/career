<?php

namespace App\Filament\Company\Resources\VacancyResource\Pages;

use App\Filament\Company\Resources\VacancyResource;
use Filament\Actions\CreateAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;

class CreateVacancy extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = VacancyResource::class;


    public function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            CreateAction::make(),
        ];
    }
}
