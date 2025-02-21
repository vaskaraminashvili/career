<?php

namespace App\Enums;

enum VacancyStatus: string
{
    case PENDING = 'pending';
    case DECLINED = 'declined';
    case APPROVED = 'approved';

    public function getColor(): string
    {
        return match ($this) {
            self::PENDING => 'primary',
            self::DECLINED => 'danger',
            self::APPROVED => 'success',
        };
    }
}
