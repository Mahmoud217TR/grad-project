<?php

namespace App\Http\Controllers;

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
        return Tag::create($this->validData());
    }

    public function show($tag){
        return compact('tag');
    }

    public function edit($tag){
        $this->authorize('update',$tag);
        // return edit view
    }

    public function update($tag){
        $this->authorize('update',$tag);
        $tag->update($this->validData());
        return compact('tag');
    }

    public function destroy($tag){
        $this->authorize('update',$tag);
        $tag->delete();
        // return redirect
    }
}
