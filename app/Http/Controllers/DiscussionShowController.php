<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Resources\DiscussionResource;
use App\Http\Resources\PostResource;
use App\Models\Discussion;
use App\Models\Post;


class DiscussionShowController extends Controller
{
    public function __invoke(Request $request, Discussion $discussion){


        $discussion->load(['topic']);
        $discussion->loadCount('replies');


        return inertia()->render("Frontend/Show",[
            'query' => $request->query(),


            'discussion' => DiscussionResource::make($discussion),

            'posts' => PostResource::collection(
                Post::whereBelongsTo($discussion)
                    ->with(['user', 'discussion'])
                    ->oldest()
                    ->paginate(10)
            ),


        ]);
    }
}
