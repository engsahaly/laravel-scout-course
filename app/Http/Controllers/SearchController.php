<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use App\Models\PostAndArticleModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        // $replica = $request->input('replica');
        $facet = $request->input('facet');
        
        if ($query) {
            // $results = Post::where('title', 'like', "%$query%")->paginate(5);
            
            // $results = Post::search($query)
            // ->with(['facetFilters' => "category:$facet"])
            // ->paginate(5);
            
            
            // $results = Post::search($query)->within('articles_and_posts_aggregator')->paginate(5);
            // $results = PostAndArticleModel::search($query)->paginate(5);
            
            $results = Post::search($query)->orderBy('views', 'asc')->paginate(5);

            // $paginator = Post::search($query)->paginateRaw(5);
            // $results = collect($paginator->items()['hits']);

            // $builder = Post::search($query);

            // if ($replica) {
            //     $builder->within($replica);
            // }

            // $results = $builder->paginate(5);
        }

        return view('search', get_defined_vars());
    }
}
