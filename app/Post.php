<?php

namespace App;

use App\Tag;
use App\User;
use App\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{


    // to use SoftDelete
    use softDeletes;
    protected $dates = ['deleted_at'];

        // to  insert data using Model u have to fillable the column that u want to insert it some data
        protected $fillable = [
            'user_id',
            'name',
            'description',
        ];



    // One to one relationship reverse
    /*
    public function user() {
        return $this->belongsTo(User::class);
    }
    */


    // One To many
    // multiple posts related to one user
    /*
    public function user() {
        return $this->belongsTo(User::class);
    }
    */


        // // Polymorphoc One To One Relationship
        // public function photo() {
        //     return $this->morphOne(Photo::class, 'imageable');
        // }


                // Polymorphoc Many To Many Relationship
                public function tags() {
                    return $this->morphToMany(Tag::class, 'taggable');
                }


    // if we don't follow the naming convertion

    /* Override the tbl name
    protected $table = "posts";
    */

    /* Override the PK
    protected $primaryKey = "post_id";
    */





}
