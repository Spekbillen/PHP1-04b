<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subsection;
use Illuminate\Http\Request;

class SubsectionController extends Controller
{
    public function show(Subsection $subsection)
    {
        $subsectionPosts = Post::orderBy('id', 'DESC')->with([
            'subsection' => function ($query) {
                $query->select('id', 'name');
            },
            'user' => function ($query) {
                $query->select('id', 'name');
            },
            'comments'
        ])->where('subsection_id', '=', $subsection['id'])->get();
        $idk = $subsection;
        return view('subsection.show', compact('subsectionPosts'));
    }
}
