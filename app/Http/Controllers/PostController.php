<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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

        $posts = Post::paginate(3);

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
          'photo'=>$path ?? null

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


    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post'=>$post]);
    }


    public function update(StoreRequest $request, Post $post)
    {
       if($request->hasFile('photo')){
           if(isset($post->photo)){
               Storage::delete($post->photo);
           }
           $name = $request->file('photo')->getClientOriginalName();
           $path = $request->file('photo')->storeAs('post-photos', $name);}

        $post->update([
            'title'=>$request->title,
            'short_content'=>$request->short_content,
           'content'=>$request->content,
            'photo'=>$path ?? null
        ]);
       return redirect()->route('posts.show', ['post'=>$post->id]);
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
