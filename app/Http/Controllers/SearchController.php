<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            $results = Post::where('title', 'like', "%$query%")->paginate(5);
        }

        return view('search', get_defined_vars());
    }
}
