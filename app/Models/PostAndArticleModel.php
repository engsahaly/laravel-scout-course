<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class PostAndArticleModel extends Model
{
    use Searchable;
    
    public function searchableAs()
    {
        return 'articles_and_posts_aggregator';
    }
}
