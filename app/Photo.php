<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
        // Polymorphoc One To One Relationship 
        public function imageable() {
            return $this->morphTo();
        }
}
