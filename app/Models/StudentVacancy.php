<?php

namespace App\Models;

use App\Enums\VacancyStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentVacancy extends Pivot
{
    protected $table = 'student_vacancy';

    protected $fillable = [
        'student_id',
        'vacancy_id',
        'status',
        'comment',
    ];

    protected $casts = [
        'status' => VacancyStatus::class,
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function company()
    {
        return $this->vacancy->company();
    }

}
