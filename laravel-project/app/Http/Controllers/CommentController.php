<?php

namespace App\Http\Controllers;

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
        return Comment::create($data);
    }

    public function show(Comment $comment){
        return compact('comment');
    }

    public function edit(Comment $comment){
        $this->authorize('update',$comment);
        // return edit view
    }

    public function update(Comment $comment){
        $this->authorize('update',$comment);
        $comment->update($this->validData());
        return compact('comment');
    }

    public function destroy(Comment $comment){
        $this->authorize('delete',$comment);
        $comment->delete();
        // return redirect
    }
}
