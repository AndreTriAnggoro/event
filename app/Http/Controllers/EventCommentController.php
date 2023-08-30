<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Comment;

class EventCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function destroy(Comment $comment)
    {
        if ($comment->user_id === auth()->user()->id) {
            $comment->delete();
        }
        return redirect()->back();
    }
}
