<!-- resources/views/home.blade.php -->
@extends('layout.layout')

@section('title', 'Home')

@section('content')
    @if (isset($articles) && count($articles) > 0)
    @foreach ($articles as $article)
        @if ($article->title !== '[Removed]')
            <x-news-card :article="$article"/>
        @endif
    @endforeach
    @else
    {{ 'No articles found.' }}
    @endif
@endsection

