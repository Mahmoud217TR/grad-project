<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FollowingController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    const TYPES = [
        'user',
        'language',
        'tag',
    ];

    const TYPE_VALUE = [
        'user'=> 0,
        'language'=> 1,
        'tag'=> 2,
    ];

    const PROCESSES = ['follow', 'unfollow'];

    private function getValidRequest(){
        return request()->validate([
            'type' => ['required','string',Rule::in(self::TYPES)],
            'object_id' => 'required',
            'process' => ['required','string',Rule::in(self::PROCESSES)],
        ]);
    }

    private function getValidStatus(){
        return request()->validate([
            'type' => ['required','string',Rule::in(self::TYPES)],
            'object_id' => 'required',
        ]);
    }

    private function followUser($object){
        $user = auth()->user();
        if(!$user->isFollowingUser($object)){
            $user->following()->attach($object,['type'=>self::TYPE_VALUE['user']]);
        }
    }

    private function unfollowUser($object){
        $user = auth()->user();
        if($user->isFollowingUser($object)){
            $user->following()->detach($object,['type'=>self::TYPE_VALUE['user']]);
        }
    }

    private function userHandler($object, $process){
        if($process == 'follow'){
            $this->followUser($object);
        }else{
            $this->unfollowUser($object);
        }
    }

    private function followLanguage($object){
        $user = auth()->user();
        if(!$user->isFollowingLanguage($object)){
            $user->languages()->attach($object,['type'=>self::TYPE_VALUE['language']]);
        }
    }

    private function unfollowLanguage($object){
        $user = auth()->user();
        if($user->isFollowingLanguage($object)){
            $user->languages()->detach($object,['type'=>self::TYPE_VALUE['language']]);
        }
    }

    private function languageHandler($object, $process){
        if($process == 'follow'){
            $this->followLanguage($object);
        }else{
            $this->unfollowLanguage($object);
        }
    }

    private function followTag($object){
        $user = auth()->user();
        if(!$user->isFollowingTag($object)){
            $user->tags()->attach($object,['type'=>self::TYPE_VALUE['tag']]);
        }
    }

    private function unfollowTag($object){
        $user = auth()->user();
        if($user->isFollowingTag($object)){
            $user->tags()->detach($object,['type'=>self::TYPE_VALUE['tag']]);
        }
    }

    private function tagHandler($object, $process){
        if($process == 'follow'){
            $this->followTag($object);
        }else{
            $this->unfollowTag($object);
        }
    }

    public function getStatus($data){
        $result = 'not following';
        if($data['type'] == 'user'){
            $user = User::findOrFail($data['object_id']);
            if(auth()->user()->isFollowingUser($user)){
                $result = 'following';
            }
        }else if($data['type'] == 'language'){
            $language = Language::findOrFail($data['object_id']);
            if(auth()->user()->isFollowingLanguage($language)){
                $result = 'following';
            }
        }else{
            $tag = Tag::findOrFail($data['object_id']);
            if(auth()->user()->isFollowingTag($tag)){
                $result = 'following';
                return $result;
            }
        }
        return $result;
    }

    public function follow(){
        $data = $this->getValidRequest();
        if($data['type']=='user'){
            $object = User::findOrFail($data['object_id']);
            $this->userHandler($object, $data['process']);
        }else if($data['type']=='language'){
            $object = Language::findOrFail($data['object_id']);
            $this->authorize('view',$object);
            $this->languageHandler($object, $data['process']);
        }else{
            $object = Tag::findOrFail($data['object_id']);
            $this->tagHandler($object, $data['process']);
        }
    }
    
    public function getFollowStatus(){
        $data = $this->getValidStatus();
        return $this->getStatus($data);
    }
}
