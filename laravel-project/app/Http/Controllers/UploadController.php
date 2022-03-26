<?php

namespace App\Http\Controllers;

use Faker\UniqueGenerator;
use Illuminate\Http\Request;
use Image;

class UploadController extends Controller
{
    public function uploadImg(){
        $data = request()->validate([
            'profile_pic' => 'required|file|image|mimes:jpg,bmp,png|max:5000'
        ]);
        $profile_pic = $data['profile_pic']->store('uploads','public');
        Image::make('storage/'.$profile_pic)->fit(256)->save();
        auth()->user()->profile->update(compact('profile_pic'));
        return back();
    }
}
