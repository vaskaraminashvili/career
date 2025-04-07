<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VacancyController extends Controller
{
    use AuthorizesRequests;

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

    public function applyForVacancy($id)
    {
        $student = auth()->user()->student;
        $this->authorize('send-cv', $student);
        $vacancy = Vacancy::query()
            ->where('status', 1)
            ->where('id', $id)
            ->with(['company'])
            ->firstOrFail();
        $student->vacancies()->syncwithoutdetaching($vacancy);

        return redirect()->route('vacancies.show', $vacancy)
            ->with('success', trans('თქვენი მოთხოვნა წარმატებით გაიგზავნა!!!'));
    }
}
