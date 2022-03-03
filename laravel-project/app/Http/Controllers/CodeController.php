<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
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
        $this->authorize('create');
        // return create view
    }

    public function store(){
        $this->authorize('create');
        return Code::create($this->validData());
    }

    public function show($id){
        $code = Code::findOrfail($id);
        $this->authorize('view',$code);
        return compact('code');
    }

    public function edit($id){
        $code = Code::findOrfail($id);
        $this->authorize('update',$code);
        // return edit view
    }

    public function update($id){
        $code = Code::findOrfail($id);
        $this->authorize('update',$code);
        $code->update($this->validData());
        return compact('code');
    }

    public function destroy($id){
        $code = Code::findOrfail($id);
        $this->authorize('delete',$code);
        $code->destroy();
        // return redirect
    }
}
