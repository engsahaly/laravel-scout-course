<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $replica = $request->input('replica');
        
        if ($query) {
            // $results = Post::where('title', 'like', "%$query%")->paginate(5);
            // $results = Post::search($query)->paginate(5);

            $builder = Post::search($query);

            if ($replica) {
                $builder->within($replica);
            }

            $results = $builder->paginate(5);
        }

        return view('search', get_defined_vars());
    }
}
