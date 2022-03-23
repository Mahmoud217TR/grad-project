<?php

namespace App\Http\Controllers;

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
        $languages = Language::all();
        return compact('languages');
    }

    public function create(){
        $this->authorize('create');
        // return create view
    }

    public function store(){
        $this->authorize('create');
        return Language::create($this->validData());
    }

    public function show(Language $language){
        $this->authorize('view',$language);
        return compact('language');
    }

    public function edit(Language $language){
        $this->authorize('update',$language);
        // return edit view
    }

    public function update(Language $language){
        $this->authorize('update',$language);
        $language->update($this->validData());
        return compact('language');
    }

    public function destroy(Language $language){
        $this->authorize('delete',$language);
        $language->delete();
        // return redirect
    }
}
