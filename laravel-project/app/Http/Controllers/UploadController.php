<?php

namespace App\Http\Controllers;

use Faker\UniqueGenerator;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImg(){
        $data = request()->validate([
            'profile_pic' => 'required'
        ]);
        $image_path = $data['profile_pic']->store('uploads','public');
        $profile_pic = $image_path;
        auth()->user()->profile->update(compact('profile_pic'));
        return back();
    }
}
