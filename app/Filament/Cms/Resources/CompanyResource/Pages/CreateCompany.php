<?php

namespace App\Filament\Cms\Resources\CompanyResource\Pages;

use App\Enums\UserType;
use App\Filament\Cms\Resources\CompanyResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompany extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = CompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $user = User::create([
            'email'    => $data['user_email'],
            'password' => bcrypt($data['user_password']),
            'type'     => UserType::COMPANY,
        ]);

        unset($data['user_email'], $data['user_password'], $data['user_password_confirmation']);

        $data['user_id'] = $user->id;
        return $data;
    }
}
