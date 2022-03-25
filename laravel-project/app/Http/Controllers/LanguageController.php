<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function validData(){
        return request()->validate([
            'name' => 'required|string|max:100|unique:languages',
            'description' => 'required|string|max:400'
        ]);
    }

    public function index(){
        $languages = Language::Approved()->paginate(9);
        return view('language.index',compact('languages'));
    }

    public function create(){
        $this->authorize('create',Language::class);
        return view('language.create', ['language'=>new Language]);
    }

    public function store(){
        $this->authorize('create',Language::class);
        $data = $this->validData();
        if(auth()->user()->isWebAdmin()){
            $data['status'] = Language::getStatus('approved');
        }
        $language = Language::create($data);
        event(new InsertionEvent($language,"Language",auth()->user()));
        // flash a message
        return redirect()->route('language.index');
    }

    public function show(Language $language){
        $this->authorize('view',$language);
        return view('language.show',compact('language'));
    }

    public function edit(Language $language){
        $this->authorize('update',$language);
        return view('language.edit',compact('language'));
    }

    public function update(Language $language){
        $this->authorize('update',$language);
        $language->update($this->validData());
        event(new ModificationEvent($language,"Language",auth()->user()));
        // flash a message
        return redirect()->route('language.show',$language);
    }

    public function destroy(Language $language){
        $this->authorize('delete',$language);
        event(new DeletionEvent($language,"Language",auth()->user()));
        $language->delete();
        // flash a message
        return view('language.index');
    }
}
