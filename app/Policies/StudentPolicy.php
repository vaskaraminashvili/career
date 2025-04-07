<?php

namespace App\Policies;

class StudentPolicy
{

    public function sendCv($user)
    {
        return !empty($user->student->studentCv) && !empty($user->student->phone);
    }
}
