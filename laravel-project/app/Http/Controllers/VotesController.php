<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VotesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    private const Votes = ['upvote','downvote','remove'];

    private function getPostData(){
        return request()->validate([
            'post_id' => 'required',
            'vote' => ['required',Rule::in(self::Votes)]
        ]);
    }

    private function votePost($user, $post, $upvote){
        if(!$user->hasVotedPost($post)){
            $user->postVotes()->attach($post,['upvote'=>$upvote]);
        }
    }

    private function unvotePost($user, $post){
        if($user->hasVotedPost($post)){
            $user->postVotes()->detach($post);
        }
    }

    public function voteOnPost(){
        $data = $this->getPostData();
        $post = Post::findOrFainl($data['post_id']);
        $this->authorize('view',$post); // not sure if it will work
        if($data['vote']=='remove'){
            $this->unvotePost(auth()->user(),$post);
        }else{
            $this->votePost(auth()->user(),$post,($data['vote' == 'upvote']));
        }
    }

    private function getCommentData(){
        request()->validate([
            'comment_id' => 'required',
            'vote' => ['required',Rule::in(self::Votes)]
        ]);
    }

    private function voteComment($user, $comment, $upvote){
        if(!$user->hasVotedComment($comment)){
            $user->commentVotes()->attach($comment,['upvote'=>$upvote]);
        }
    }

    private function unvoteComment($user, $comment){
        if(!$user->hasVotedComment($comment)){
            $user->commentVotes()->detach($comment);
        }
    }

    public function voteOnComment(){
        $data = $this->getCommentData();
        $comment = Comment::findOrFainl($data['comment_id']);
        $this->authorize('view',$comment); // not sure if it will work
        if($data['vote']=='remove'){
            $this->unvotePost(auth()->user(),$comment);
        }else{
            $this->votePost(auth()->user(),$comment,($data['vote' == 'upvote']));
        }
    }
}
