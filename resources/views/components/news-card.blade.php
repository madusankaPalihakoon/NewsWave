@props(['article'])

<div class="container article-container">
    <div class="container article-bg">
        <img src="{{ isset($article->urlToImage) ? $article->urlToImage : 'https://placeholder.com/500' }}" alt="">
    </div>
    <div class="container article-text">
        <h2 class="article-title"><a href="">{{ $article->title }}</a></h2>
    </div>
</div>