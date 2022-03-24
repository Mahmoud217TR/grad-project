<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function validData(){
        return request()->validate([
            'content' => 'required|string|max:500'
        ]);
    }

    public function index(){
        $comments = Comment::all();
        return compact('comments');
    }

    public function create(){
        // return create view
    }

    public function store(){
        $data = $this->validData();
        $data['user_id'] = auth()->id();
        $comment = Comment::create($data);
        event(new InsertionEvent($comment,"Comment",auth()->user()));
    }

    public function show(Comment $comment){
        $this->authorize('view',Comment::class);
        return $comment;
    }

    public function edit(Comment $comment){
        $this->authorize('update',$comment);
        // return edit view
    }

    public function update(Comment $comment){
        $this->authorize('update',$comment);
        $comment->update($this->validData());
        event(new ModificationEvent($comment,"Comment",auth()->user()));
        return $comment;
    }

    public function destroy(Comment $comment){
        $this->authorize('delete',$comment);
        $comment->delete();
        event(new DeletionEvent($comment,"Comment",auth()->user()));
        // return redirect
    }
}
