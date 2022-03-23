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
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:400'
        ]);
    }

    public function index(){
        $codes = Code::all();
        return compact('codes');
    }

    public function create(){
        $this->authorize('create', Code::class);
        return view('code.create', ['code'=>new Code]);
    }

    public function store(){
        $this->authorize('create', Code::class);
        $data = $this->validData();
        if(auth()->user()->isWebAdmin()){
            $data['status'] = Code::getStatus('approved');
        }
        $code = Code::create($data);

        // flash a message
        return $code; // needs update
    }

    public function show(Code $code){
        $this->authorize('view',$code);
        return view('code.show',compact('code'));
    }

    public function edit(Code $code){
        $this->authorize('update',$code);
        return view('code.edit', compact('code'));
    }

    public function update(Code $code){
        $this->authorize('update',$code);
        $code->update($this->validData());
        return compact('code');
    }

    public function destroy(Code $code){
        $this->authorize('delete',$code);
        $code->delete();
        // return redirect
    }
}
