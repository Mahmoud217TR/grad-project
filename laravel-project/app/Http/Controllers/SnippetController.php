<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
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
        $snippet = Snippet::create($data);
        event(new InsertionEvent($snippet,"Snippet",auth()->user()));
        return $snippet;
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
        event(new ModificationEvent($snippet,"Snippet",auth()->user()));
        return $snippet;
    }

    public function destroy(Snippet $snippet){
        $this->authorize('delete',$snippet);
        event(new DeletionEvent($snippet,"Snippet",auth()->user()));
        $snippet->delete();
        // return redirect
    }
}
