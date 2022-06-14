<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $comment = \request()->validate(['comment' => 'required']);
        $data = ['user_id' => Auth::user()->id, 'post_id' => $post['id'], 'comment' => $comment['comment'], 'up_votes' => '0', 'down_votes' => '0'];
        Comment::create($data);
        return redirect('/p/' . $post['id']);
    }

    public function edit(Comment $comment)
    {
        if ($comment['user']['id'] === Auth::user()->id) {
            return view('comment.edit', compact('comment'));
        }
    }

    public function update(Comment $comment)
    {
        if ($comment['user']['id'] === Auth::user()->id) {
            $data = \request()->validate([
                'comment' => 'required'
            ]);
            $comment->update($data);
            return redirect('/p/' . $comment['post_id']);
        }
    }

    public function destroy(Comment $comment)
    {
        if ($comment['user_id'] === Auth::user()->id) {
            $comment->delete();
            return redirect('/p/'. $comment['post_id']);
        } else {
            abort(403);
        }
    }
}
