@extends('layout')
@section('title', 'articles')
@section('content')

    <a class="btn btn-primary" href="{{route('articles.create')}}">new article</a>
    {{$articles-> links()}}
    <table class="table table-striped">
        <thead>
        <th>id</th>
        <th>title</th>
        <th>created</th>
        <th>modified</th>
        <th>actions</th>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->created_at}}</td>
                <td>{{$article->updated_at}}</td>
                <td>
                    <form method="POST" action="{{route('articles.destroy',['article' => $article->id])}}">
                        <a class="btn btn-primary" href="{{route('articles.show',['article' => $article->id])}}">view</a>
                        <a class="btn btn-warning" href="{{route('articles.edit',['article' => $article->id])}}">edit</a>
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$articles-> links()}}
@endsection
