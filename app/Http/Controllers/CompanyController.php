<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(12);
        return view('company.index', compact('companies'));
    }
}
