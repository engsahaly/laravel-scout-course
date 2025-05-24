<?php

namespace App\Search;

use App\Models\Post;
use App\Models\Article;
use Algolia\ScoutExtended\Searchable\Aggregator;

class ArticlesAndPostsAggregator extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        Post::class,
        Article::class
    ];
}
