<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

    //
    public function index() {
        return view('post.create_post');
    }

    public function create(Request $request) {
        // dd("done");
        // dd($request->all());
        //dd($request->name);

        // to add user_id manullay 
        // $post = new Post();
        // $post->user_id = 1;

        // checkbox
        // $is_active = $request->is_active == null ? "0": "1";   // checked = 0 
        $user_id = 1;
        // validatin
        $request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:3',
        ]);
            // dd('done');

        //  to store data in database
            $post = Post::create([
                'user_id' => $user_id,
                'name' => $request->name,
                'description' => $request->description,                
            ]);

            // we redirect to create post with success session 
            return redirect()->back()->with('success', 'Post Created Successfully');

    }


    // to display all posts 
    public function posts() {
        // $posts = Post::where('is_active', '1')->get();
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }



    // to delete a specific post 
    public function delete($id) {
        $post = Post::find($id);
        $post->forceDelete();
        return redirect()->back()->with('success', "post has benn deleted");
    }


    // to edit a post you have to get the post detail 
    public function get($id) {
        $post= Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request) {
            //dd($request->all());

            // $show = $request->checkbox == null ? "0" : "1";
            $request->validate([
                'name' => 'required|min:3|max:40',
                'description' => 'required|min:3',
            ]);
            $id = $request->post_id;
            $post = Post::find($id);
            $post->name = $request->name;
            $post->description = $request->description;
            $post->save();

            return redirect()->back()->with('success', "Post Updated");

    }

}
