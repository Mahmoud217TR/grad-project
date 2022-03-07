<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    
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

    public function show($id){
        $profile = Profile::findOrfail($id);
        return compact('profile');
    }

    public function edit($id){
        $profile = Profile::findOrfail($id);
        $this->authorize('update',$profile);
        // return edit view
    }

    public function update($id){
        $profile = Profile::findOrfail($id);
        $this->authorize('update',$profile);
        $profile->update($this->validData());
        return compact('profile');
    }

    public function destroy($id){
        $profile = Profile::findOrfail($id);
        $this->authorize('delete',$profile);
        $profile->destroy();
        // return redirect
    }
}
