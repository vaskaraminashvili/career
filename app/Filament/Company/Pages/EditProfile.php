<?php

namespace App\Filament\Company\Pages;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.company.pages.edit-profile';

    public static function getNavigationLabel(): string
    {
        return static::$navigationLabel ??
            static::$title ??
            __('filament-panels::pages/dashboard.profile');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                    ->relationship('company')
                    ->schema([
                        TextInput::make('title.ka')
                            ->translateLabel()
                            ->label('Title Geo')
                            ->required(),
                        TextInput::make('title.en')
                            ->translateLabel()
                            ->label('Title Eng')
                            ->required(),
                        TextInput::make('address.ka')
                            ->translateLabel()
                            ->label('Address Geo')
                            ->required(),
                        TextInput::make('address.en')
                            ->translateLabel()
                            ->label('Address Eng')
                            ->required(),
                        RichEditor::make('description.ka')
                            ->translateLabel()
                            ->label('Description Geo')
                            ->required(),
                        RichEditor::make('description.en')
                            ->translateLabel()
                            ->label('Description Eng')
                            ->required(),
                        SpatieMediaLibraryFileUpload::make('Photo')
                            ->translateLabel()
                            ->acceptedFileTypes(['image/jpeg', 'image/png'])
                            ->collection('company'),
                        TextInput::make('phone')
                            ->numeric()
                            ->required()
                    ])
                    ->inlineLabel(false)
                    ->columns(2),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    protected function fillForm(): void
    {
        $data = $this->getUser()->load('company')->toArray();

        $this->callHook('beforeFill');

        $data = $this->mutateFormDataBeforeFill($data);
        $this->form->fill($data);

        $this->callHook('afterFill');
    }
}
