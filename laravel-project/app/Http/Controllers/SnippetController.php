<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function validData(){
        return request()->validate([
            'code' => 'required|string|max:2000',
            'note' => 'required|string|max:1000'
        ]);
    }

    public function index(){
        $snippets = Snippet::all();
        return compact('snippets');
    }

    public function create(){
        // return create view
    }

    public function store(){
        $data = $this->validData();
        $data['user_id'] = auth()->id();
        return Snippet::create($data);
    }

    public function show(Snippet $snippet){
        $this->authorize('view',$snippet);
        return compact('snippet');
    }

    public function edit(Snippet $snippet){
        $this->authorize('update',$snippet);
        // return edit view
    }

    public function update(Snippet $snippet){
        $this->authorize('update',$snippet);
        $snippet->update($this->validData());
        return compact('snippet');
    }

    public function destroy(Snippet $snippet){
        $this->authorize('delete',$snippet);
        $snippet->delete();
        // return redirect
    }
}
