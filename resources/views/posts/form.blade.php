@extends('layout')

@section('title', 'Posts')

@section('body')
    <form method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                   @isset($post) value="{{ $post->title }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug"
                   @isset($post) value="{{ $post->slug }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Body</label>
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1"
                      rows="3">@isset($post){{ $post->body }}@endisset</textarea>
        </div>
        <div class="mb-3">
            <label for="select1" class="form-label">Categories</label>
            <select name="CategoriesList[]" class="form-select" id="select1" multiple
                    aria-label="multiple select example">
                @foreach($categories as $category)
                    @if($category->id === $post->category_id)
                        <option selected value="{{$category->id}}">{{$category->title}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="select2" class="form-label">Tags</label>
            <select name="TagsList[]" class="form-select" id="select2" multiple aria-label="multiple select example">
                @foreach($tags as $tag)
                    @if(in_array($tag->id, $tags_selected))
                        <option selected value="{{$tag->id}}">{{$tag->title}}</option>
                    @else
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @isset($post)
            <input type="hidden" name="id" value="{{ $post->id }}">
        @endisset

        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
@endsection
