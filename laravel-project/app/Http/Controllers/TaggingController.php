<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sheet;
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

    private function validatePostData(){
        return request()->validate([
            'pid' => 'required',
            'tids' => ['required'],
            'action' => ['required',Rule::in(self::ACTIONS)],
        ]);
    }

    private function validateSnippetData(){
        return request()->validate([
            'sid' => 'required',
            'tids' => ['required'],
            'action' => ['required',Rule::in(self::ACTIONS)],
        ]);
    }

    private function process($object, $tag, $action){
        if($this->isValidAction($action)){
            if($action === 'attach'){
                if(!$object->isTagged($tag)){
                    $object->tags()->attach($tag);
                }
            }else{
                if($object->isTagged($tag)){
                    $object->tags()->detach($tag);
                }
            }
        }
    }
    
    public function post_tags(){
        
        $data = $this->validatePostData();

        $post = Post::findOrfail($data['pid']);
        $this->authorize('update',$post);

        foreach($data['tids'] as $tid){
            $tag = Tag::findOrfail($tid);
            $this->process($post, $tag, strtolower($data['action']));
        }

        return ['post'=>$post,'post_tags'=>$post->tags];
    }

    public function snippet_tags(){

        $data = $this->validateSnippetData();

        $snippet = Snippet::findOrfail($data['sid']);
        $this->authorize('update',$snippet);

        foreach($data['tids'] as $tid){
            $tag = Tag::findOrfail($tid);
            $this->process($snippet, $tag, strtolower($data['action']));
        }

        return ['snippet'=>$snippet,'snippet_tags'=>$snippet->tags];
    }

    public function sheet_tags(){

        $data = $this->validateSnippetData();

        $sheet = Sheet::findOrfail($data['sid']);
        $this->authorize('update',$sheet);

        foreach($data['tids'] as $tid){
            $tag = Tag::findOrfail($tid);
            $this->process($sheet, $tag, strtolower($data['action']));
        }

        return ['sheet'=>$sheet,'sheet_tags'=>$sheet->tags];
    }
}
