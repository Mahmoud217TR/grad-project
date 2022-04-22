<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    
    public function validData(){
        return request()->validate([
            'title' => 'required|string|max:200',
            'content' => 'required|string|max:800',
            'status' => ['required',Rule::in(Post::getStatuses())],
        ]);
    }

    public function index(){
        $posts = Post::published()->latest()->with('user','user.profile')->withCount('comments')->paginate(5);
        return view('post.index',compact('posts'));
    }

    public function create(){
        $this->authorize('create',Post::class);
        return view('post.create',['post'=>new Post, 'statuses'=>Post::getStatuses()]);
    }

    public function store(){
        $this->authorize('create',Post::class);
        $data = $this->validData();
        $data['user_id'] = auth()->id();
        $data['status'] = Post::getStatusValue($data['status']);
        $post =  Post::create($data);
        event(new InsertionEvent($post,"Post",auth()->user()));
        return redirect()->route('post.show',$post);
    }

    public function show(Post $post){
        $post->with(['user','user.profile','comments','comments.user','comments.user.profile']);
        return view('post.show',compact('post'));
    }

    public function edit(Post $post){
        $this->authorize('update',$post);
        return view('post.edit',['post'=>$post, 'statuses'=>Post::getStatuses()]);
    }

    public function update(Post $post){
        $this->authorize('update',$post);
        $data = $this->validData();
        $data['status'] = Post::getStatusValue($data['status']);
        $post->update($data);
        event(new ModificationEvent($post,"Post",auth()->user()));
        return redirect()->route('post.show',$post);
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        event(new DeletionEvent($post,"Post",auth()->user()));
        // return redirect
    }
}
