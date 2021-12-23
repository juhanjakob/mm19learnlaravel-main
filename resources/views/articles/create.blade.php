@extends('layout')
@section('title', 'New Article')
@section('content')
    <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('title')
            @foreach($errors->get('title') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
        </div>
        @error('body')
            @foreach($errors->get('body') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @enderror
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="body" rows="12" name="body">{{old('body')}}</textarea>
        </div>

        @error('tags')
            @foreach($errors->get('tags') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @enderror
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select class="form-select" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        @error('image')
        @foreach($errors->get('image') as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

