<?php

namespace App\Filament\Company\Pages\Auth;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;

class RegisterCompany extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                Hidden::make('type')->default('company'),
            ]);
    }

    protected function handleRegistration(array $data): \Illuminate\Database\Eloquent\Model
    {
        $user = parent::handleRegistration($data);

        $empty = [];
        $empty['ka'] = '';
        $empty['en'] = '';
        $company = \App\Models\Company::create([
            'user_id'     => $user['id'],
            'title'       => $empty,
            'address'     => $empty,
            'description' => $empty,
            'status'      => 1,
        ]);

        return $user;
    }
}


