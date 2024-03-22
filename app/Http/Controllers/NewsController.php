<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\NewsApiService;

class NewsController extends Controller
{
    public function index()
    {
        // Instantiate the News API service
        $newsApiService = new NewsApiService();

        // Fetch news articles from the API
        $apiArticles = $newsApiService->getTopNews();
        $apiArticles = json_decode(json_encode($apiArticles['articles']), true);
        foreach ($apiArticles as $apiArticle) {
            dd($apiArticle['content']);
        }

        if(!isset($apiArticles)) {
            // Retrieve all news articles from the database
            $articles = News::orderBy('created_at', 'desc')->paginate(6);
        
            // Return the view with the retrieved news articles
            return view('index', [
                'articles' => $articles
            ]);
        }

        // Decode JSON response
        $apiArticles = json_decode(json_encode($apiArticles['articles']), true);

        // Iterate over each article
        foreach ($apiArticles as $apiArticle) {
            // dd($apiArticle);
            // Check if the article already exists in the database
            $existingNews = News::where('title', $apiArticle['title'])->first();
        
            // If the article doesn't exist, save it to the database
            if (!$existingNews) {
                $articleData = [
                    'source' => $apiArticle["source"]["id"]."/".$apiArticle['source']["name"],
                    'name' => $apiArticle['source']['name'],
                    'author' => $apiArticle['author'],
                    'title' => $apiArticle['title'],
                    'description' => $apiArticle['description'],
                    'url' => $apiArticle['url'],
                    'urlToImage' => $apiArticle['urlToImage'],
                    'publishedAt' => $apiArticle['publishedAt'],
                    'content' => $apiArticle['content'],
                    'created_at' => now()
                ];

                News::insert([$articleData]); // Pass $articleData instead of $apiArticle                
            }
        }                

        // Retrieve all news articles from the database
        $articles = News::orderBy('created_at', 'desc')->paginate(6);
        
        // Return the view with the retrieved news articles
        return view('index', [
            'articles' => $articles
        ]);
    }

    public function article(string $title, int $id)
    {
        $article = News::where('id', $id)
                        ->where('title', $title)
                        ->first();
    
        return view('article/article', [
            'article' => $article
        ]);
    }    
}
