<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        // $user = auth()->user();
        // $followingIds =$user->followings()
        // $idea = Idea::withOut('user')->orderBy('created_at', 'DESC');

        // if (request()->has('search')) {

        //     $idea = $idea->where('content', 'like', '%' . request()->get('search') . '%');
        // }

        // return view(
        //     "dashboard",
        //     [
        //         'ideas' => $idea->paginate(5),
        //     ]
        // );
    }
}
