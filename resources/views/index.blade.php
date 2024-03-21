<!-- resources/views/home.blade.php -->
@extends('layout.layout')

@section('title', 'Home')

@section('content')
    @if (isset($articles) && count($articles) > 0)
    <div class="container top-news">
    @foreach ($articles as $article)
        @if ($article->title !== '[Removed]')
            <x-news-card :article="$article"/>
        @endif
    @endforeach
    </div>
    @else
    {{ 'No articles found.' }}
    @endif
@endsection

