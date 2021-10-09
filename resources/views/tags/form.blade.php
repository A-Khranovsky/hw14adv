@extends('layout')

@section('title', 'Tags')

@section('body')
    <form method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                   @isset($tag) value="{{ $tag->title }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug"
                   @isset($tag) value="{{ $tag->slug }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="select1" class="form-label">Posts</label>
            <select name="PostsList[]" class="form-select" id="select1" multiple aria-label="multiple select example">
                @foreach($posts as $post)
                    @if(in_array($post->id, $post_selected ))
                        <option selected value="{{$post->id}}">{{$post->title}}</option>
                    @else
                        <option value="{{$post->id}}">{{$post->title}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        @isset($tag)
            <input type="hidden" name="id" value="{{ $tag->id }}">
        @endisset

        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
@endsection
