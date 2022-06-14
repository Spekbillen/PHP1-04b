<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->with([
            'subsection' => function ($query) {
                $query->select('id', 'name');
            },
            'user' => function ($query) {
                $query->select('id', 'name');
            },
            'comments'
        ])->get();
        return view('home', compact('posts'));
    }

    public function create()
    {
        $subsections = Subsection::all('name', 'id');
        return view('posts.create', compact('subsections'));
    }

    public function store()
    {
        $user_id = Auth::user()->id;
        $subsection_id = Subsection::all(['id', 'name'])->where('name', '=', \request()->validate(['subsection' => 'required'])['subsection'])->first()['id'];
        $title = \request()->validate(['title' => 'required'])['title'];
        $comment = \request()->validate(['text' => 'required'])['text'];
        $up_votes = 0;
        $down_votes = 0;
        $data = compact('user_id', 'subsection_id', 'title', 'comment', 'up_votes', 'down_votes');
        Post::create($data);
        return redirect('/');
    }

    public function show(Post $post)
    {
        $comments = Comment::orderBy('id', 'DESC')->with(['user' => function ($query) {
            $query->select('id', 'name');
        }])->where('post_id', '=', $post['id'])->get();
        return view('posts.show', compact('post', 'comments'));
    }

    public function edit(Post $post)
    {
        if ($post['user']['id'] === Auth::user()->id) {
            return view('posts.edit', compact('post'));
        } else {
            abort(403);
        }
    }

    public function update(Post $post)
    {
        if ($post['user']['id'] === Auth::user()->id) {
            $data = \request()->validate([
                'title' => 'required',
                'comment' => 'required'
            ]);
            $post->update($data);
            return redirect('/p/' . $post['id']);
        } else {
            abort(403);
        }
    }

    public function destroy(Post $post)
    {
        if ($post['user']['id'] === Auth::user()->id) {
            $post->delete();
            return redirect('/');
        } else {
            abort(403);
        }
    }
}
