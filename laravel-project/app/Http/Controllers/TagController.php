<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
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
        // return create view
    }

    public function store(){
        return Tag::create($this->validData());
    }

    public function show($id){
        $tag = Tag::findOrfail($id);
        return compact('tag');
    }

    public function edit($id){
        $tag = Tag::findOrfail($id);
        // return edit view
    }

    public function update($id){
        $tag = Tag::findOrfail($id);
        $tag->update($this->validData());
        return compact('tag');
    }

    public function destroy($id){
        Tag::findOrfail($id)->destroy();
        // return redirect
    }
}
