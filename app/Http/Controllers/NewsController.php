<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::query()
            ->where('id', $id)
            ->first();
        return view('news.show', compact('news'));
    }
}
