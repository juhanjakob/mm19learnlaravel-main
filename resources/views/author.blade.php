@extends('layout')
@section('title',)
@section('content')
    <h1>{{$author->name}}</h1>
    <h2>Articles: {{$author->articles()->count()}}</h2>
    <h2>Comments made: {{$author->comments()->count()}}</h2>
    <h2>Comments on posts: {{$author->comments}}</h2>

    
    <div class="row row-cols-4 mt-3" >
        @foreach($author->articles as $article)
            <div class="col mb-3">

                @if($article->images->count())
                    @if($article->images->count() > 1)
                        @include('partials.carousel', ['images'=>$article->images, 'id'=>$article->id])
                    @else

                        <img src="{{$article->images->first()->path}}" class="card-img-top" alt="...">
                    @endif
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{$article->excerpt }} </p>
                    <a href="{{route("article", ['article' => $article-> id])}}" class="btn btn-primary mb-2">Read more</a>

                    <p class="card-text">
                        <a href="/articles/author/{{$article->user->id}}"> <small class="text-muted">{{$article->user->name}}</small></a><br>
                        <small class="text-muted">Created: {{$article->created_at->diffForHumans()}}</small><br>
                        <small class="text-muted">Updated: {{$article->updated_at->diffForHumans()}}</small><br>
                        <small class="text-muted me-2">Comments: {{$article->comments()-> count()}}</small>
                        <small class="text-muted">Likes: {{$article->likes()-> count()}}</small>
                    </p>

                    <a href="/articles/{{$article->id}}/like">
                        @if($article->isliked)
                            unlike
                        @else
                            Like
                        @endif
                    </a>
                    <br>
                    @foreach($article->tags as $tag)
                        <a href="/articles/tags/{{$tag->id}}" class="text-decoration-none">
                            <span class="badge rounded-pill bg-secondary mt-2">
                                {{$tag->name}}
                            </span></a>

                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

@endsection
