<?php

namespace App\Filament\User\Pages;

use App\Models\Company;
use App\Models\StudentVacancy;
use App\Models\Vacancy;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class StudentVacancies extends Page implements HasTable, HasActions
{
    use InteractsWithTable;

    public static ?string $title = 'Vacancies';
    protected static ?string $navigationLabel = 'Vacancies';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.user.pages.student-vacancies';

    public function __construct()
    {
        self::$title = __('Vacancies');
        self::$navigationLabel = __('Vacancies');
    }


    public function table(Table $table): Table
    {
        $student_id = auth()->user()->student->id;
        return $table
            ->query(
                StudentVacancy::query()
                    ->with([
                        'vacancy.company'
                    ])
                    ->where('student_id', $student_id)
            )
            ->columns([
                TextColumn::make('vacancy.company.title')
                    ->label(__('company title'))
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('vacancy.title')
                    ->label(__('Vacancies'))
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
                        Fieldset::make()
                            ->relationship('company')
                            ->schema([
                                TextInput::make('company.title')
                                    ->label(fn() => __('Company Title'))
                                    ->columnSpanFull()
                                    ->formatStateUsing(function ($state, Company $record) {
                                        return $record->title;
                                    }),

                            ]),
                        Fieldset::make()
                            ->relationship('vacancy')
                            ->schema([
                                TextInput::make('title.' . app()->getLocale())
                                    ->label(fn() => __('Title'))
                                    ->columnSpanFull(),
                                RichEditor::make('description.' . app()->getLocale())
                                    ->label(fn() => __('Description'))
                                    ->formatStateUsing(function ($state, Vacancy $record) {
                                        return $record->description;
                                    })
                                    ->columnSpanFull(),
                                TextInput::make('Date')
                                    ->label(__('Start Date') . ' / ' . __('End Date'))
                                    ->formatStateUsing(function ($state, Vacancy $record) {
                                        return $record->start_date . ' / ' . $record->end_date;
                                    }),
                            ])
                            ->columns(2),
                    ]),
            ])
            ->defaultSort('student_id');
    }
}
