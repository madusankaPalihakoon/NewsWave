<!-- resources/views/home.blade.php -->
@extends('layout.layout')

@section('title', 'Home')

@section('content')
    {{-- {{ $location }} --}}
    {{-- @if (isset($articles) && count($articles) > 0)
        <div class="container top-news">
            @foreach ($articles as $article)
                @if ($article->title !== '[Removed]')
                    <x-news-card :article="$article"/>
                @endif
            @endforeach
        </div>
        <nav aria-label="Page navigation pagination-container">
            <ul class="pagination">
                {{ $articles->links() }}
            </ul>
        </nav>
    @else
        {{ 'No articles found.' }}
    @endif --}}

    <script>
        if('geolocation' in navigator) {
            // Get the user's current position
            navigator.geolocation.getCurrentPosition(function(position) {
                // Retrieve latitude and longitude
                var latitude = position.coords.latitude;
                console.log(latitude);
                var longitude = position.coords.longitude;
                console.log(longitude);

                // Send location data to the server using AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/location', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('latitude=' + latitude + '&longitude=' + longitude);
            });
        } else {
            // Geolocation is not supported by this browser
            console.log('Geolocation is not supported by this browser.');
        }
    </script>
@endsection
