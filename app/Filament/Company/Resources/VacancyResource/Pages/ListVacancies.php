<?php

namespace App\Filament\Company\Resources\VacancyResource\Pages;

use App\Filament\Company\Resources\VacancyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVacancies extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = VacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
