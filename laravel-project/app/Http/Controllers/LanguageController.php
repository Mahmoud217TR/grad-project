<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
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
        // return create view
    }

    public function store(){
        return Language::create($this->validData());
    }

    public function show($id){
        $language = Language::findOrfail($id);
        return compact('language');
    }

    public function edit($id){
        $language = Language::findOrfail($id);
        // return edit view
    }

    public function update($id){
        $language = Language::findOrfail($id);
        $language->update($this->validData());
        return compact('language');
    }

    public function destroy($id){
        Language::findOrfail($id)->destroy();
        // return redirect
    }
}
