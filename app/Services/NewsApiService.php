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
            $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines', [
                'query' => [
                    'country' => 'us',
                    'apiKey' => env('NEWS_API_KEY'),
                ]
            ]);
    
            $news = json_decode($response->getBody()->getContents(), true);
    
            return $news;
        } catch (\Throwable $th) {
            Log::error('Error fetching top news: ' . $th->getMessage());
            
            return [];
        }
    }
}
