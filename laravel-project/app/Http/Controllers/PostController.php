<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
        return Post::create($this->validData());
    }

    public function show($id){
        $post = Post::findOrfail($id);
        return compact('post');
    }

    public function edit($id){
        $post = Post::findOrfail($id);
        $this->authorize('update',$post);
        // return edit view
    }

    public function update($id){
        $post = Post::findOrfail($id);
        $this->authorize('update',$post);
        $post->update($this->validData());
        return compact('post');
    }

    public function destroy($id){
        $post = Post::findOrfail($id);
        $this->authorize('delete',$post);
        $post->destroy();
        // return redirect
    }
}
