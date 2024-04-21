<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id)
    {
        $idea = new Idea();
        $comment = new Comment();
        $comment->idea_id = $id;
        $comment->content = request()->get('content');

        $comment->save();

        return redirect()->route('idea.show', $id)->with('success', 'Comment is posted successfully');
    }
}
