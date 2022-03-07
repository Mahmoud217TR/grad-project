<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Snippet;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaggingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    private const ACTIONS = ['attach','detach'];

    private function isValidAction($action){
        if(!in_array($action,self::ACTIONS)){
            return false;
        }else{
            return true;
        }
    }

    private function validateData(){
        return request()->validate([
            'tids' => ['required'],
            'action' => ['required',Rule::in(self::ACTIONS)],
        ],
        ['tids.required' => 'this is my custom error message for required']);
    }

    private function process($object, $tag, $action){
        if($action === 'attach'){
            if(!$object->tags->pluck('id')->contains($tag->id)){
                $object->tags()->attach($tag);
            }
        }else if ($action == 'detach'){
            $object->tags()->detach($tag);
        }
    }
    
    public function post_tags($pid){
        
        $data = $this->validateData();

        $post = Post::findOrfail($pid);
        $this->authorize('update',$post);

        foreach($data['tids'] as $tid){
            $tag = Tag::findOrfail($tid);
            $this->process($post, $tag, strtolower($data['action']));
        }

        return ['post'=>$post,'post_tags'=>$post->tags];
    }

    public function snippet_tags($sid){

        $data = $this->validateData();

        $snippet = Snippet::findOrfail($sid);
        $this->authorize('update',$snippet);

        foreach($data['tids'] as $tid){
            $tag = Tag::findOrfail($tid);
            $this->process($snippet, $tag, strtolower($data['action']));
        }

        return ['post'=>$snippet,'post_tags'=>$snippet->tags];
    }
}
