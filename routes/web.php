<?php

use App\Post;
use App\Role;
use App\User;
use App\Photo;
use App\Video;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use Illuminate\Database\Eloquent\Collection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


/* COntroller vid 6
Route::get('/post', "PostsController@index");
Route::get('/post/{id}', "PostsController@new");
*/

/* Resource Controller
Route::resource('/book', "BookController");
*/

/* Showing a view via controller
Route::get('/test', 'PostController@test');
Route::view('/test', 'test');
*/



/*   Views   vid 7

// diplay a view via custom method inside the resource controller
Route::get('/test', 'BookController@test');

// display a parameter
Route::get('/test/{id}', 'BookController@test');
Route::get('/test/{id}/{name}/{pass}', 'BookController@test');


*/




// Blade Template
/*
Route::get('/master', 'PostController@master');
Route::get('/contact', 'PostController@contact');
Route::get('/about', 'PostController@about');
*/



// Migration
/*
create --> php artisan make:migration definition
php artisan make:migration definition --create='tblname'
execute --> php artisan migrate
add column to specifi table --> php artisan make:migration add_col_to_posts --table="posts"
to drop column --> dropColumn('is_admin');
to drop a table --> Schema::dropIfExists('posts');
*/


// ROW SQL QUERIES
// CRUD OPERATION

/*
// Insert Data
Route::get('/insert', function() {
    DB::insert("INSERT INTO posts(title, des) values(?, ?)", ["Third ", "Third Post DESC"]);
});

// Select Data
Route::get('/select', function() {
    $data = DB::select("SELECT * FROM posts");
    //  return var_dump($data);

    foreach($data as $d) {
        echo $d->title . "<br>";
        echo $d->des . "<br>";
        echo "<br>";
    }
});

Route::get('/select/{id}', function($id) {
    $where_res = DB::select('SELECT * FROM posts WHERE id=?', [1]);
    foreach($where_res as $w) {
        return $w->title . " " . $w->des;
    }
});


// Updata Data
Route::get('/update/{id}', function($id) {
    $update = DB::update("UPDATE posts SET title='Second' WHERE id=?", [$id]);
    return $update;
});


// Delete Data
Route::get('/delete/{id}', function($id) {
    $del = DB::delete('DELETE FROM posts WHERE id=?', [$id]);
    return $del;
});

*/





///////////////////     Model  && Eloquent ///////////////////


// create --> php artisan make:model ModelName
// create with migration -> php artisan make:model -m
// create with migration -> php artisan make:model -migration


// Select Or Read The data using Model //////////////////////////////////////////

/*

// all() Method
Route::get('/all', function() {
    $posts = Post::all();
    // return var_dump($posts);
    foreach ($posts as $post) {
        echo $post->name . "<br>";
        echo $post->description . "<br>";
        echo "<br>";
    }
});

// find() Method
Route::get('/find/{id}', function($id) {
    $posts = Post::find($id);
        echo $posts->name . "<br>";
        echo $posts->description . "<br>";

});

//Select Data using where clause
Route::get('/select/{id}', function($id) {
    $posts = Post::where('id', $id)->first();    // first record
        echo $posts->name . "<br>";
        echo $posts->description . "<br>";

});

//Select Data using where clause
Route::get('/select/{id}', function($id) {
    $posts = Post::where('id', $id)->get();      // all records
        foreach($posts as $post) {
            echo $post->name;
        }

});

// FindOrFail() Method
// if exists display otherwise go to 404 page
Route::get('/findorfail/{id}', function($id) {
    $posts = Post::FindOrFail($id);      // all records
        return $posts->name;
});




// findMany([1, 2]);
// to find many records
Route::get('/findmany', function() {
    $posts = Post::findMany([1, 3]);
        foreach($posts as $post) {
            echo $post->name . "<br>";
        }
});

// Method Chaining
Route::get('/where_active_zero', function() {
    $posts = Post::where('is_active', 0)->first();
    $posts = Post::where('is_active', 0)->get();
    $posts = Post::where('is_active', 1)->orderBy('id', 'desc')->get();
        foreach($posts as $post) {
            echo $post->name . "<br>";
        }
});
*/



// Create Or Insert  Data  using Model

/*
Route::get('/insert', function() {
    $post = new Post;
    $post->name = "Test Post";
    $post->description = "Test Desc";
    $post->save();
});


// OR

Route::get('/create', function() {
    $post = new Post;
    $post::create([
        'name' => 'create post using model',
        'description' => "description of this post"
    ]);

});
*/


//   Update data using Model
/*
Route::get('/update/{id}', function($id) {
    $post = new Post;
    $post::find($id);
    $post->name = ' Updated Title';
    $post->description = "Updated Descrrption";
    $post->save();
});


// OR

Route::get('/updated/{id}', function($id) {
    $post = new Post;
    $post::where('id', $id)->update([
        'name' => 'Updated',
        'description' => "Updated",
    ]);

});

*/


// Deleteing data using Model
/*
Route::get('/delete/{id}', function($id) {
    $post = new Post;
    // $post = Post::find($id);
    $post::find($id)->delete();
    return "success";
});


// OR
Route::get('/deleted/{id}', function($id) {
    $post = new Post;
    //$post::destroy($id);
    $post::destroy([1, 2]);
    $post::where('id', $id)->delete();
    return "success";
});

*/


// Soft Delete
// go to model and use softDeletes; then   protected $dates=["deleted_at"];
//and import this class at the top   use Illuminate\Database\Eloquent\softDeletes;
// By soft delete we can restore deleted data from trash
/*
Route::get('/soft/{id}', function($id){
    Post::find($id)->delete();
    return "deleted";
});

// to display all soft deleted post
Route::get('/allTrash', function() {
    $post = Post::onlyTrashed()->first();
    // $post = Post::onlyTrashed()->get();
        return $post->description;
});

// to display all posts including soft deleted posts
Route::get('/withTrash', function() {
    $post = Post::withTrashed()->first();
    // $post = Post::withTrashed()->find($id)->first();
        return $post->description;
});

*/


// Restore Soft deleted posts
/*
// resotre only soft deltes
Route::get('/restore', function() {
    $post = new Post;
    $post->onlyTrashed()->find(5)->restore();
});

// restore all posts
Route::get('/restoreall', function() {
    $post = new Post;
    $post->withTrashed()->find(5)->restore();
});
*/




//   Force Delete
/*
Route::get('/force/{id}', function($id) {
    $post = new Post;
    $post::find($id)->forceDelete();
});

// to delte soft delte file permenantly
Route::get('/forceSoft/{id}', function($id) {
    $post = new Post;
    $post::onlyTrashed()->find($id)->forceDelete();
});
*/




////////////////   Tinker  ////////////////////
// php artisan tinker


//  create data using tinker
/*
 first create the obj of the specific Model   $post = new App\Post;
 $post::create(['name' => "tinker name", 'description' => "tinker description")];
OR
$p = new App\Post;
$p->name = "tinker";
$p->description= "tink desci";
$p->save();
*/

/*
// Select Or Read Data
// create an object
// $p = new App\Post;

// to read all data
// $p::all();

// get the specific records
// $p::find(id);

// get only the first record
// $p::where('id', $id)->first();

// And condition
// $p::whereId(id)->where('name', 'tinker')->first();
*/


// Update Data Using tinker
/*
// create an obj
// $p= new App\Post;

// find ther record
// $p::find(1);
// $p->name = "Updated";
// $p->description = "Updated";
// $p->save();

// OR
// $p::find(1)->update(['name' => "updated", 'description' => 'updated' ]);
*/


// Soft Delete
/*
// create an obj
// $d = new App\Post;
// $d::find(1)-delete();
*/


// Restore data Using Tinker
/*
// create an obj
// $restore = new App\Post;
 // $restore::onlyTrashed()->find(1)->restore();
*/



// Force Delete

// create an obj
// $d = new App\Post;
// $d::find(1)->forceDelete();
// $id::onlyTrashed()->find(1)->forceDelete();



/////////////  Relationship ////////////////////

// One To One
/*
// One user has one post
// one post belongs to one specific user
// 1. create Model
// 2. create Migration and Table
// 3. Create Method inside the model to implement the relationship
// 4. add FK constraint to tables
// 5. migrate
// 6. fetch data using eloquent

// First find the user and display
// find specific user post
Route::get('/user/{id}', function($id){
    $user = new User;
    $u = $user::find($id);
    //$u->post::all();  // it will display the specific user info
    // dd($u);
    return $u->post->name;
});


// to reverse the relation ship
// first find the post
// find the post user
Route::get('/post/{id}', function($id){
    $post = new Post;
    $p = $post::find($id);
    // $p->user::all();  // it will display the specific user  all posts
    // dd($p);
    return $p->user->name;
});

*/


// One To Many
/*
//  An user can have multiple posts
// A post belongs to one specific user

Route::get('/user/{id}', function($id) {
    $user =  User::find($id);
    // dd($user->posts);  // show all posts belongs to this user
    foreach($user->posts as $u ) {
        echo $u->name;  // post name
            // $post->user->email    // it will occur an error
    }
});


//Inverse
// it will search posts and retrieve all posts related to the user

Route::get('/post/{id}', function($id) {
    $post =  Post::find($id);
    dd($post->user->email);  // show all posts belongs to this user


});

*/



// Many TO Many
/*
// ex1
// In this case we have multiple posts and each post have multiple text
// Each of the specific  text belongs to multiple posts

// ex2
// user has multiple rules (admin, faculty, student)
// (Admin, faculty, student) have multiple user

// we use (pivot table) --> it contains PK of two tables
// 1. create model User & Role
// 2. migration users, role_user(Pivot Table) , roles
// 3. create method to implement the relationship
// 4. add FK to migration
// 5. Migrate
// 6. Fetch using Eloquent



// 1. php artisan make:model Role -m
// 2. php artisan make:migration create_users_roles --table="role_user"
// 3.  User --> fun roles() belongsToMany(Role::class )
// 4. $table->foriegn('user_id')->references('id')->on('users')->onDelete('cascade');
//$table->foriegn('role_id')->references('id')->on('roles')->onDelete('cascade');
// 5. migrate tables


// to display the user role
Route::get('/userRole/{id}', function($id) {
    $user = User::find($id);
    dd($user->roles);  // this user role
});


// reverse order  specific role users
Route::get('/roleUser/{id}', function($id) {
    $role = Role::find($id);
    dd($role->users);  // this role users
});

*/






// Has Many Through Relationship
/*
// create 3 model Post User Country
// User has a relationship with post
// there is no relation between country and post


// 1. create Country model -- php artisan make:model Country -m
// now merge country to users because user has a relation with country  add country_id to users
// 2. php artisan make:migration add_country_id_to_users_table --table="users"
//   up() --> $table->unsignedBigINteger('country_id');
// down()  --> $table->dropCoulmn('country_id');
// 3. create method to define relationship
// Model>Couuntry -->
// public function posts() {
//  return $this->hasManyThrough(Post::class, User::class);
//}
// 4. Make a route to display data
Route::get('/country/{id}', function($id) {
    $country = Country::find($id);
    //dd($country);  // all users belongs to this country
    //dd($country->posts);  // all posts belongs to this user related to this country
    foreach($country->posts as $post) {
        echo $post->description . "<br>";
    }

});
*/






//////////////////    Has One Through Relationship //////////////////////////
// this relationship is smilar to HasMany
/*
Route::get('/country/{id}', function($id) {
    $country = Country::find($id);
    //dd($country);
    // dd($country->post);
    dd($country->post->description);
});
*/




///////////////  Polymorphic One to One Relationship /////////////////
/*
// similar to one to one relationship
// in this case we can create relationship with more than one tbales

// Create Model (User, Post, Photo)
// PHOTO --> php artisan make:model Photo -m
// Create Mehod photo()  to make relationship


// now get all photo belongs to users table
Route::get('/muser/{id}', function($id) {
    $user = User::find($id);
    //dd($user);
    dd($user->photo);
    dd($user->photo->image);
});


// Now get all photo belongs to the posts table
Route::get('/mpost/{id}', function($id) {
    $post = Post::find($id);
    //dd($post);
    dd($post->photo);
    dd($post->photo->image);
});



// Reverse Relationship
Route::get('/photo/{id}', function($id) {
    $photo = Photo::find($id);
    // dd($photo);
    dd($photo->imageable);
});



*/


/////// Polymorphic One To Many  Relationship //////////
/*
// we have 3 model (user, photo, post)
// post and user can have multiple photos
// but one photo can belong to one specific user or post

Route::get('/musers/{id}', function($id) {
    $user = User::find($id);
    dd($user->photos);
});

Route::get('/mposts/{id}', function($id) {
    $post = Post::find($id);
    dd($post->photos);
});


*/


/////////// Polymorphic Many TO Many Relationship  /////////////////
/*
// create migrations,  Models (Post, Video, Tag, Tagaable)
// post can have multiple tags and each tag can belong to many posts
// video can have multiple tags and each tag can belong to many videos
// create methods to create relationship

// Make routes
Route::get('/postTags/{id}', function($id) {
    $post = Post::find($id);
    dd($post->tags);
});


Route::get('/videoTags/{id}', function($id) {
    $vid = Video::find($id);
    //dd($vid);
    //dd($vid->tags);
    foreach($vid->tgs as $tag) {
        echo $tag . "<br>";
    }
});
*/



///////// Middleware ////////////
// it provides security
// creating middleware
// php artisan make:middleware CheckRole


// globaling the middleware
/*
// add this path to kernal.php in protected $middleware array
// \App\Http\Middleware\CheckRole::class,
// create views
// making routes for the views
Route::get('/admin', function() {
    return view('admin');
});

Route::get('/user', function() {
    return view('user');
});
*/

// to assgin a middleware to a specific route
/*
Route::get('/admin/{role}', function($role){
    return view('admin');
})->middleware('CheckRole');
// add this chekRole Middleware in kerne;.php   --> protected $roteMiddleware   array
*/



// applying middleware to group of routes
/*
Route::group(['middleware' => ['CheckRole']], function() {
    // add routes belongs to admin panel
    Route::get('/admin/{role}', function($role) {
        return view('admin');
    });

} );

*/




/////  Creating Master Blade For Form Validation ////////////

// Master Layout
Route::get('/', function() {
    return view('layout.home');
});


// create route for posts

Route::get('/create_post', "PostController@index");
Route::get('/create', "PostController@create");
Route::get('/all_post', 'PostController@posts');
Route::get('/delete/{id}', 'PostController@delete');
Route::get('/get/{id}', 'PostController@get');
Route::get('/update', 'PostController@update');
///////////////// Form Validation ///////////////







//////Clear Cache ////////////
// artisan ::   php artisan config:cache
// php artisan clear:cache

Route::get('/clearCache', function() {
    Artisan::call('cache:clear');
    dd('cache cleared');
});






