<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sheet;
use App\Models\Snippet;
use App\Models\Tag;
use Dotenv\Validator;
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
            'pid' => 'required|exists:posts,id',
            'action' => ['required',Rule::in(self::ACTIONS)],
            'tids' => 'required|array',
            'tids.*' => '|required|exists:tags,id',
        ]);
    }

    private function validateSnippetData(){
        return request()->validate([
            'sid' => 'required|exists:snippets,id',
            'action' => ['required',Rule::in(self::ACTIONS)],
            'tids' => 'required|array',
            'tids.*' => '|required|exists:tags,id',
        ]);
    }

    
    private function validateSheetData(){
        return request()->validate([
            'sid' => 'required|exists:sheets,id',
            'action' => ['required',Rule::in(self::ACTIONS)],
            'tids' => 'required|array',
            'tids.*' => '|required|exists:tags,id',
        ]);
    }

    private function process($object, $tag, $action){
        if($this->isValidAction($action)){
            if($action === 'attach'){
                if(!$object->isTaggedBy($tag)){
                    $object->tags()->attach($tag);
                }
            }else{
                if($object->isTaggedBy($tag)){
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
    }

    public function snippet_tags(){

        $data = $this->validateSnippetData();

        $snippet = Snippet::findOrfail($data['sid']);
        $this->authorize('update',$snippet);

        foreach($data['tids'] as $tid){
            $tag = Tag::findOrfail($tid);
            $this->process($snippet, $tag, strtolower($data['action']));
        }
    }

    public function sheet_tags(){
        $data = $this->validateSheetData();

        $sheet = Sheet::findOrfail($data['sid']);
        $this->authorize('update',$sheet);

        foreach($data['tids'] as $tid){
            $tag = Tag::findOrfail($tid);
            $this->process($sheet, $tag, strtolower($data['action']));
        }
    }
}
