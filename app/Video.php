<?php

namespace App;

use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
                    // Polymorphoc Many To Many Relationship 
                    public function tags() {
                        return $this->morphToMany(Tag::class, 'taggable');
                    }
}
