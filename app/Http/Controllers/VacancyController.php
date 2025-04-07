<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::query()
            ->where('status', 1)
            ->with(['company'])
            ->orderBy('id', 'desc')
            ->limit(9)
            ->get();
        return view('vacancy.index', compact('vacancies'));
    }

    public function show($id)
    {
        $vacancy = Vacancy::query()
            ->where('status', 1)
            ->where('id', $id)
            ->with(['company'])
            ->firstOrFail();
//      
        return view('vacancy.show', compact('vacancy'));
    }

    public function companyVacancies($company_id)
    {
        $vacancies = Vacancy::query()
            ->where('status', 1)
            ->whereHas('company', function ($query) use ($company_id) {
                $query->where('id', $company_id);
            })
            ->with(['company'])
            ->get();
        return view('vacancy.index', compact('vacancies'));
    }
}
