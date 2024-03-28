<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class NewsApiService
{
    public function getTopNews()
    {
        try {
            $client = new Client([
                'verify' => false,
            ]);
            "https://api.worldnewsapi.com/search-news?&api-key=0e98c24082634d09bebe24a911404f00&text=top";
            $response = $client->request('GET', 'https://api.worldnewsapi.com/search-news', [
                'query' => [
                    'api-key' => env('NEWS_API_KEY'),
                    'text' => 'top',
                    'language' => 'en'
                    
                ]
            ]);  
            // $response = $client->request('GET', 'https://api.worldnewsapi.com/api/v1/news', [
            //     'query' => [
            //         'search' => 'covid',
            //         'api-key' => env('NEWS_API_KEY'),
            //         'language' => 'en'
            //     ]
            // ]);            
    
            $news = json_decode($response->getBody()->getContents(), true);
    
            return $news;
        } catch (\Throwable $th) {
            Log::error('Error fetching top news: ' . $th->getMessage());
            
            return [];
        }
    }
}
