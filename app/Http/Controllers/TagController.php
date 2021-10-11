<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', ['tags' => $tags]);
    }

    public function form()
    {
        $request = request();

        $data = [];

        $data['post_selected'][] = 0;

        if ($request->method() == 'POST') {
            if (!$request->has('id')) {
                $tags = Tag::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug')
                ]);
                $tags->posts()->sync($request->get('PostsList'));
            } else {
                $tags = Tag::find($request->get('id'));
                $tags->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug')
                ]);
                $tags->posts()->sync($request->get('PostsList'));
            }

            return redirect('/tags');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['tag'] = Tag::find($id);
            foreach ($data['tag']->posts as $post) {
                $data['post_selected'][] = $post->id;
            }
        }

        $data['posts'] = Post::All();

        return view('tags.form', $data);
    }

    public function delete()
    {
        $tag = Tag::find(request()->route()->parameter('id'));
        $tag->posts()->detach();
        $tag->delete();

        return redirect('/tags');
    }
}
