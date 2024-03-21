@props(['article'])
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>{{ $article->title }}</h2>
        </div>
        <div class="card-body">
            <p>{{ $article->description }}</p>
        </div>
    </div>
</div>