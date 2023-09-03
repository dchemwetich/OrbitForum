<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Http\Resources\DiscussionResource;
use App\Http\Resources\PostResource;
use App\Models\Discussion;
use App\Models\Post;


class DiscussionShowController extends Controller
{
    public function __invoke( Discussion $discussion){


        $discussion->load(['topic']);
        return inertia()->render("Frontend/Show",[
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
