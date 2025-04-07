<?php

namespace App\Filament\Company\Pages;

use App\Enums\VacancyStatus;
use App\Models\Student;
use App\Models\StudentVacancy;
use App\Models\Vacancy;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Applicants extends Page implements HasTable, HasActions
{
    use InteractsWithTable;

    public static ?string $title = 'Applicants';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.company.pages.applicants';
    protected static ?string $navigationLabel = 'Applicants';

    public function __construct()
    {
        self::$title = __('Applicants');
        self::$navigationLabel = __('Applicants');
    }

    public function table(Table $table): Table
    {
        $user = auth()->user()->load(['company.vacancies']);
        $user_vacancies = $user->company?->vacancies->pluck('id')->toArray();

        return $table
            ->query(
                StudentVacancy::query()
                    ->with([
                        'student', 'vacancy'
                    ])
                    ->whereIn('vacancy_id', $user_vacancies)
            )
            ->columns([
                TextColumn::make('student.first_name')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->student->first_name . ' ' . $record->student->last_name;
                    })
                    ->label(__('Student'))
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('vacancy.title')
                    ->label(__('Vacancy'))
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('vacancy')
                    ->label(__('Start Date') . ' / ' . __('End Date'))
                    ->formatStateUsing(function ($state, $record) {
                        return $record->vacancy->start_date . ' / ' . $record->vacancy->end_date;
                    }),
                TextColumn::make('status')
                    ->formatStateUsing(function ($state) {
                        return __($state->value);
                    })
                    ->label(__('Status'))
                    ->badge()
                    ->color(function ($state) {
                        return $state->getColor();
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()
                    ->form([
                        Actions::make([
                            Action::make(__('confirm'))
                                ->color('success')
                                ->icon('heroicon-m-check')
                                ->requiresConfirmation()
                                ->action(function (StudentVacancy $record) {
                                    $record->update([
                                        'status' => VacancyStatus::APPROVED,
                                    ]);
                                }),
                            Action::make(__('decline'))
                                ->color('danger')
                                ->requiresConfirmation()
                                ->action(function (StudentVacancy $record) {
                                    $record->update([
                                        'status' => VacancyStatus::DECLINED,
                                    ]);

                                })
                        ]),
                        Fieldset::make()
                            ->relationship('vacancy')
                            ->schema([
                                TextInput::make('vacancy.title')
                                    ->label(fn() => __('Vacancy Title'))
                                    ->columnSpanFull()
                                    ->formatStateUsing(function ($state, Vacancy $record) {
                                        return $record->title;
                                    }),
                                TextInput::make('Date')
                                    ->label(__('Start Date') . ' / ' . __('End Date'))
                                    ->formatStateUsing(function ($state, Vacancy $record) {
                                        return $record->start_date . ' / ' . $record->end_date;
                                    }),
                            ]),
                        Fieldset::make()
                            ->relationship('student')
                            ->schema([
                                TextInput::make('student.first_name')
                                    ->formatStateUsing(function ($state, Student $record) {
                                        return $record->first_name . ' ' . $record->last_name;
                                    })
                                    ->label(fn() => __('Applicant Name'))
                                    ->columnSpanFull(),

                                TextInput::make('cv_link')
                                    ->label('CV Link')
                                    ->formatStateUsing(function ($state, Student $record) {
                                        $media = Media::where('collection_name', 'student_cv')
                                            ->where('model_id', $record->id)
                                            ->first();
                                        return $media ? $media->getUrl() : 'No CV uploaded';
                                    })
                                    ->disabled()
                                    ->columnSpanFull(),

                            ])
                            ->columns(2),
                    ]),
            ])
            ->defaultSort('student_id');
    }

}
