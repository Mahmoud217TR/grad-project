<?php

namespace App\Http\Controllers;

use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function validData(){
        return request()->validate([
            'name' => 'required|string|max:100|unique:tags',
            'description' => 'required|string|max:400'
        ]);
    }

    public function index(){
        $tags = Tag::all();
        return compact('tags');
    }

    public function create(){
        $this->authorize('create');
        // return create view
    }

    public function store(){
        $this->authorize('create');
        $tag = Tag::create($this->validData());
        event(new InsertionEvent($tag,"Tag",auth()->user()));
        return $tag;
    }

    public function show(Tag $tag){
        return compact('tag');
    }

    public function edit(Tag $tag){
        $this->authorize('update',$tag);
        // return edit view
    }

    public function update(Tag $tag){
        $this->authorize('update',$tag);
        $tag->update($this->validData());
        event(new ModificationEvent($tag,"Tag",auth()->user()));
        return $tag;
    }

    public function destroy(Tag $tag){
        $this->authorize('update',$tag);
        event(new ModificationEvent($tag,"Tag",auth()->user()));
        // return redirect
    }
}
