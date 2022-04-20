<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    
    public function validData(){
        return request()->validate([
            'title' => 'required|string|max:200',
            'content' => 'required|string|max:800'
        ]);
    }

    public function index(){
        $posts = Post::all();
        return compact('posts');
    }

    public function create(){
        $this->authorize('create');
        // return create view
    }

    public function store(){
        $this->authorize('create');
        $data = $this->validData();
        $data['user_id'] = auth()->id();
        $post =  Post::create($data);
        event(new InsertionEvent($post,"Post",auth()->user()));
        return $post;
    }

    public function show(Post $post){
        $post->with(['user','comments','comments.user']);
        return view('post.show',compact('post'));
    }

    public function edit(Post $post){
        $this->authorize('update',$post);
        // return edit view
    }

    public function update(Post $post){
        $this->authorize('update',$post);
        $post->update($this->validData());
        event(new ModificationEvent($post,"Post",auth()->user()));
        return $post;
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        event(new DeletionEvent($post,"Post",auth()->user()));
        // return redirect
    }
}
