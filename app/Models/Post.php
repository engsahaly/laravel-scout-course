<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    
    public function toSearchableArray()
    {
        return [
            'id' => (string) $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'views' => $this->views,
            'category' => $this->category->name,
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function shouldBeSearchable()
    // {
    //     return $this->published;
    // }

    // public function getScoutKey()
    // {
    //     return $this->title;
    // }


    // public function searchableAs()
    // {
    //     return 'custom_posts_name';
    // }

    protected $guarded = [];
}
