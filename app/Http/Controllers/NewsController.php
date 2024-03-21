<?php

namespace App\Http\Controllers;

use App\Services\NewsApiService;

class NewsController extends Controller
{
    protected $newsService;
    public function __construct()
    {
        $this->newsService = new NewsApiService();
    }
    public function index()
    {
        $news = $this->newsService->getTopNews();
        $articles = json_decode(json_encode($news['articles']));
        // dd($articles);
        return view('index', [
            'articles' => $articles
        ]);
    }
}
