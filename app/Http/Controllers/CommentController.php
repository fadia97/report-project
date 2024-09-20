<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $updateId)
    {
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::create(array_merge($data, ['update_id' => $updateId]));
        return response()->json($comment, 201);
    }
}
