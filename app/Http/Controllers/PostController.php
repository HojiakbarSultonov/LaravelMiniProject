<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
//    $posts = Post::all();
//    $posts = Post::where('title', 'title')->get();
//    dd($posts);

//        $newPost = new Post;
//        $newPost->title = 'new Post';
//        $newPost->short_content = 'new Post short content';
//        $newPost->content = 'new Post  content';
//        $newPost->photo = '/storage/newPhoto.jpg';
//        $newPost->save();

//    return view('posts.index');
//        $newPost= Post::create([
//            'title'=>'5',
//            'short_content'=>'short',
//            'content'=>'content 123',
//            'photo'=>'photo.jpg'
//        ]);

//        $post = Post::find(4);
//        $post ->title = 'Ozgargan title';
//        $post ->save();

        $post = Post::where('id', 2)->first();
        $post ->delete();

    return 'successs';
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {

    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {

    }
}
