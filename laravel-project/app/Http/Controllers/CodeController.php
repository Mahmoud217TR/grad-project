<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
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
        $codes = Code::Approved()->paginate(9);
        return view('code.index',compact('codes'));
    }

    public function requested(){
        $codes = Code::Requested()->paginate(9);
        return view('code.index',compact('codes'));
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
        event(new InsertionEvent($code,"Code",auth()->user()));

        // flash a message
        return redirect()->route('code.index');
    }

    public function show(Code $code){
        $this->authorize('view',$code);
        $code->with('snippets');
        return view('code.show',compact('code'));
    }

    public function edit(Code $code){
        $this->authorize('update',$code);
        return view('code.edit', compact('code'));
    }

    public function update(Code $code){
        $this->authorize('update',$code);
        $code->update($this->validData());
        event(new ModificationEvent($code,"Code",auth()->user()));
        return redirect()->route('code.show',$code);
    }

    public function destroy(Code $code){
        $this->authorize('delete',$code);
        event(new DeletionEvent($code,"Code",auth()->user()));
        // flash a message
        return route('code.index');
    }
}
