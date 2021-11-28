<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //  hasManyThrough Relationship 
    // public function posts() {
    //     // return $this->hasManyThrough(Post::class, User::class, tblUsers_country_id, tblPosts_users_id, countryPK, usersPK);
    //     return $this->hasManyThrough(Post::class, User::class);
    // }





    // hasOneThrough Relationship 
    /*
    public function post() {
    // return $this->hasOneThrough(Post::class, User::class, tblUsers_country_id, tblPosts_users_id, countryPK, usersPK);
        return $this->hasOneThrough(Post::class, User::class);
    }
    */

}
