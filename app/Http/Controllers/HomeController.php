<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\News;
use App\Models\Vacancy;

class HomeController extends Controller
{
    public function index()
    {
        $latestVacancies = Vacancy::query()
            ->where('status', 1)
            ->with(['company'])
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $lastNews = News::query()
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        $lastVacancy = Vacancy::query()
            ->whereNotIn('id', $latestVacancies->pluck('id'))
            ->orderBy('created_at', 'desc')
            ->with(['company'])
            ->first();

        $latestCompanies = Company::query()
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $latestNews = News::query()
            ->where('id', '!=', $lastNews->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('index', compact(
            'latestVacancies',
            'lastNews',
            'lastVacancy',
            'latestCompanies',
            'latestNews'
        ));
    }
}
