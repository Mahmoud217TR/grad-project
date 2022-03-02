<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function validData(){
        return request()->validate([
            'bio' => 'nullable|string|max:200',
            'pic' => 'mimes:jpg,bmp,png|nullable'
        ]);
    }

    public function index(){
        $profile = Profile::all();
        return compact('profile');
    }

    public function create(){
        // return create view
    }

    public function store(){
        return Profile::create($this->validData());
    }

    public function show($id){
        $profile = Profile::findOrfail($id);
        return compact('profile');
    }

    public function edit($id){
        $profile = Profile::findOrfail($id);
        // return edit view
    }

    public function update($id){
        $profile = Profile::findOrfail($id);
        $profile->update($this->validData());
        return compact('profile');
    }

    public function destroy($id){
        Profile::findOrfail($id)->destroy();
        // return redirect
    }
}
