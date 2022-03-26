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
        ]);
    }

    public function index(){
        $profile = Profile::all();
        return compact('profile');
    }

    public function show(Profile $profile){
        return view('profile.show',compact('profile'));
    }

    public function edit(Profile $profile){
        $this->authorize('update',$profile);
        return view('profile.edit',compact('profile'));
    }

    public function update(Profile $profile){
        $this->authorize('update',$profile);
        $profile->update($this->validData());
        return compact('profile');
    }

    public function destroy(Profile $profile){
        $this->authorize('delete',$profile);
        $profile->delete();
        // return redirect
    }
}
