<?php

namespace App\Filament\User\Pages;

use App\Models\StudentVacancy;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
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
                        'vacancy'
                    ])
                    ->where('student_id', $student_id)
            )
            ->columns([
                TextColumn::make('vacancy.title')
                    ->label(__('Vacancies'))
                    ->limit(50)
                    ->searchable(),
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
                            ->relationship('vacancy')
                            ->schema([
                                TextInput::make('title.' . app()->getLocale())
                                    ->label(fn() => __('Title'))
                                    ->columnSpanFull(),
                                Textarea::make('description.' . app()->getLocale())
                                    ->rows(10)
                                    ->label(fn() => __('Description'))
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),
                    ]),
            ])
            ->defaultSort('student_id');
    }
}
