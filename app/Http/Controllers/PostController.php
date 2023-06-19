<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
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

//        $post = Post::where('id', 2)->first();
//        $post ->delete();

        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);

    return 'successs';
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(StoreRequest $request)
    {
        if($request->hasFile('photo')){{
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);


        }}


        $post = Post::create([
          'title'=>$request->title,
          'short_content'=>$request->short_content,
          'content'=>$request->content,
          'photo'=>$path

      ]);
      return redirect()->route('posts.index');
    }


    public function show(Post $post)
    {
//        $post = Post::find($id);
       return view('posts.show')->with([
           'post'=> $post,
           'recent_posts'=>Post::latest()->get()->except($post->id)->take(5),

       ]);
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
