<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Models\Code;
use App\Models\Language;
use App\Models\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function validData(){
        return request()->validate([
            'code_snippet' => 'required|max:2000',
            'note' => 'required|string|max:1000',
            'language_id' => 'required|exists:languages,id',
            'code_id' => 'required|exists:codes,id',
        ]);
    }

    public function index(){
        $snippets = Snippet::Approved()->with(['code','language'])->paginate(9);
        return view('snippet.index',compact('snippets'));
    }

    public function requested(){
        $snippets = Snippet::Requested()->with(['code','language'])->paginate(9);
        return view('snippet.index',compact('snippets'));
    }

    public function create(){
        $this->authorize('create', Snippet::class);
        $codes = Code::Approved()->get();
        $languages = Language::Approved()->get();
        return view('snippet.create', ['snippet'=>new Snippet,'codes'=>$codes,'languages'=>$languages]);
    }

    public function store(){
        $data = $this->validData();
        $data['user_id'] = auth()->id();
        if(auth()->user()->isWebAdmin()){
            $data['status'] = Snippet::getStatus('approved');
        }
        $snippet = Snippet::create($data);
        event(new InsertionEvent($snippet,"Snippet",auth()->user()));
        return redirect()->route('snippet.index');
    }

    public function show(Snippet $snippet){
        $this->authorize('view',$snippet);
        $snippet->with(['code','snippet','code.snippets']);
        return view('snippet.show',compact('snippet'));
    }

    public function edit(Snippet $snippet){
        $this->authorize('update',$snippet);
        $snippet->with(['code','snippet']);
        $codes = Code::Approved()->get();
        $languages = Language::Approved()->get();
        return view('snippet.edit', ['snippet'=>$snippet,'codes'=>$codes,'languages'=>$languages]);
    }

    public function update(Snippet $snippet){
        $this->authorize('update',$snippet);
        $snippet->update($this->validData());
        event(new ModificationEvent($snippet,"Snippet",auth()->user()));
        return redirect()->route('snippet.show',$snippet);;
    }

    public function destroy(Snippet $snippet){
        $this->authorize('delete',$snippet);
        event(new DeletionEvent($snippet,"Snippet",auth()->user()));
        return route('snippet.index');
    }
}
