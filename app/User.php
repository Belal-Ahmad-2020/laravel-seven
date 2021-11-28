<?php

namespace App;

use App\Post;
use App\Role;
use App\Photo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //  One To One Relationship 
    /*
    public function post() {
        return $this->hasOne(Post::class);
        // hasOne(childClass, FK, PK);
    }
    */


    // One To many 
        //an user canhave multiple posts 
    public function posts() {
        return $this->hasMany(Post::class);
        // return $this->hasMany(App\Post);            
    }


    // Many To Many 
    public function roles() {
        return $this->belongsToMany(Role::class);
    }


    // Polymorphoc One To One Relationship 
    public function photo() {
        return $this->morphOne(Photo::class, 'imageable');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
