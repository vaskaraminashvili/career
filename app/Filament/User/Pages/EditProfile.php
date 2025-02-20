<?php

namespace App\Filament\User\Pages;

use Filament\Actions;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EditProfile extends Page
{
    use InteractsWithForms;
    use Translatable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.edit-profile';

    public ?array $data = [];

    public function mount(): void
    {
        $user = auth()->user();

        // Load the student relationship if it exists
        if ($user->student) {
            $user->load('student');
        }
        // Fill the form with the user's data
        $this->form->fill($user->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('student.first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('phone')->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('Student')
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->collection('student'),
                SpatieMediaLibraryFileUpload::make('cv')
                    ->acceptedFileTypes(['application/pdf'])
                    ->collection('student_cv'),
                TextInput::make('cv_link')
                    ->label('CV Link')
                    ->formatStateUsing(function ($state, $get) {
                        $media = Media::where('collection_name', 'student_cv')
                            ->where('model_id', $get('id'))
                            ->first();
                        return $media ? $media->getUrl() : 'No CV uploaded';
                    })
                    ->disabled()
                    ->visible(fn($get) => $get('cv')),
            ])
            ->statePath('data');
    }

    public function updateProfile()
    {
        dd($this->form->getState());

    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
