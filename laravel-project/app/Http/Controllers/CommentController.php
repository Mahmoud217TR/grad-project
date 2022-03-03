<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
        
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
        return Comment::create($this->validData());
    }

    public function show($id){
        $comment = Comment::findOrfail($id);
        return compact('comment');
    }

    public function edit($id){
        $comment = Comment::findOrfail($id);
        $this->authorize('update',$comment);
        // return edit view
    }

    public function update($id){
        $comment = Comment::findOrfail($id);
        $this->authorize('update',$comment);
        $comment->update($this->validData());
        return compact('comment');
    }

    public function destroy($id){
        $comment = Comment::findOrfail($id);
        $this->authorize('delete',$comment);
        $comment->destroy();
        // return redirect
    }
}
