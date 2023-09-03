<?php

namespace App\Http\Controllers;

use App\Http\QueryFilters\MentionedQueryFilter;
use App\Http\QueryFilters\MineQueryFilter;
use App\Http\QueryFilters\NoRepliesQueryFilter;
use App\Http\QueryFilters\ParticipatingQueryFilter;
use App\Http\QueryFilters\SolvedQueryFilter;
use App\Http\QueryFilters\TopicQueryFilter;
use App\Http\QueryFilters\UnsolvedQueryFilter;
use App\Http\Resources\DiscussionResource;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ForumIndexController extends Controller
{
    public function __invoke(){
        return inertia()->render("Frontend/Index",[
                'discussions' => DiscussionResource::collection(
                Discussion::with(['topic'])
                ->orderByPinned()
                ->paginate(5)

            )
        ]);
    }
}
