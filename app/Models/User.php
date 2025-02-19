<?php

namespace App\Models;

use App\Enums\UserType;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements HasName
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'type',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getFilamentName(): string
    {
        return $this->email ?? 'User';
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    protected function casts(): array
    {
        return [
            'type'              => UserType::class,
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
}
