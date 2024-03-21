<?php

namespace App\Models;

use App\Services\NewsApiService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public function __construct()
    {
        
    }

    public static function fetchNewsFromApi()
    {
        $newsService = new NewsApiService();
        $news = $newsService->getTopNews();
        $articles = json_decode(json_encode($news['articles']));

        return $articles;
    }
}
