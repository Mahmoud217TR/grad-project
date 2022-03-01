<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function __construct(){
        
    }

    public function validData(){
        return request()->validate([
            'title' => 'required|string|max:100|unique:codes',
            'description' => 'required|string|max:400'
        ]);
    }

    public function index(){
        $codes = Code::all();
        return compact('codes');
    }

    public function create(){
        // return create view
    }

    public function store(){
        return Code::create($this->validData());
    }

    public function show($id){
        $code = Code::findOrfail($id);
        return compact('code');
    }

    public function edit($id){
        $code = Code::findOrfail($id);
        // return edit view
    }

    public function update($id){
        $code = Code::findOrfail($id);
        $code->update($this->validData());
        return compact('code');
    }

    public function destroy($id){
        Code::findOrfail($id)->destroy();
        // return redirect
    }
}
