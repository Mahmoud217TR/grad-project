<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

use function PHPUnit\Framework\isNull;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bdate',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
		'role' => 0,
	];

    // Scout Functions

    #[SearchUsingPrefix(['id', 'email'])]
    #[SearchUsingFullText(['name'])]

    public function toSearchableArray(){
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }

    // Model Functions

    public static function getRoles(){
        return [
            0 => 'user',
            1 => 'reviewer',
            2 => 'editor',
            3 => 'admin',
            4 => 'super_admin'
        ];
    }

    public static function getRole($role){
        return array_search($role,self::getRoles());
    }

    private static function inRoleRange($num){
        return in_array($num,array_keys(self::getRoles()));
    }

    private static function inRoles($role){
        return in_array($role,self::getRoles());
    }

    public static function getLevel($role){
        if(self::inRoles($role)){
            return array_search($role,self::getRoles());
        }else{
            return false;
        }
    }

    public function level(){
        return $this->getLevel($this->role);
    }

    // Relations 

    public function snippets(){
        return $this->hasMany(Snippet::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function postVotes(){
        return $this->belongsToMany(Post::class,'post_user','user_id')->withPivot('upvote')->withPivot('upvote');
    }

    public function commentVotes(){
        return $this->belongsToMany(Comment::class,'comment_user','user_id')->withPivot('upvote');
    }

    // Attributes & Scopes
    
    public function getRoleAttribute($attribute){
		return self::getRoles()[$attribute];
	}

    public function scopeUsers($query){
		return $query->where('role','0');
	}

    public function scopeReviewers($query){
		return $query->where('role','1');
	}

    public function scopeEditors($query){
		return $query->where('role','2');
	}

    public function scopeAdmins($query){
		return $query->where('role','3');
	}

    public function scopeSuperAdmins($query){
		return $query->where('role','4');
	}

    public function scopeSystemAdmins($query){
		return $query->where('role','>=','3');
	}

    public function scopeWebAdmins($query){
		return $query->where('role','>','0');
	}

    // Functions

    public function isUser(){
        return $this->level() == self::getRole('user');
    }

    public function isReviewer(){
        return $this->level() == self::getRole('reviewer');
    }
    
    public function isEditor(){
        return $this->level() == self::getRole('editor');
    }

    public function isAdmin(){
        return $this->level() == self::getRole('admin');
    }

    public function isSuperAdmin(){
        return $this->level() == self::getRole('super_admin');
    }

    public function isOrAbove($role){
        return (self::inRoles($role) && $this->level() >= self::getLevel($role));
    }

    public function isOrBelow($role){
        return (self::inRoles($role) && $this->level() <= self::getLevel($role));
    }

    public function isAbove($role){
        return (self::inRoles($role) && $this->level() > self::getLevel($role));
    }

    public function isBelow($role){
        return (self::inRoles($role) && $this->level() < self::getLevel($role));
    }

    public function isSysAdmin(){
        return $this->isOrAbove('admin');
    }

    public function isWebAdmin(){
        return $this->isOrAbove('reviewer');
    }

    public function isOwner($object){
        return $this->id == $object->user_id;
    }

    public function postUpvotes(){
        return $this->postVotes->where('pivot.upvote',true);
    }

    public function postDownvotes(){
        return $this->postVotes->where('pivot.upvote',false);
    }

    public function commentUpvotes(){
        return $this->commentVotes->where('pivot.upvote',true);
    }

    public function commentDownvotes(){
        return $this->commentVotes->where('pivot.upvote',false);
    }

    public function getPostVote($post){
        return $this->postVotes->where('id',$post->id)->first();
    }

    public function hasVotedPost($post){
        return !(is_null($this->getPostVote($post)));
    }

    public function isPostUpvoted($post){
        if($this->hasVotedPost($post)){
            return $this->getPostVote($post)->pivot->upvote == true;
        }else{
            return false;
        }
    }

    public function isPostDownvoted($post){
        if($this->hasVotedPost($post)){
            return $this->getPostVote($post)->pivot->upvote == false;
        }else{
            return false;
        }
    }

    public function getCommentVote($comment){
        return $this->commentVotes->where('id',$comment->id)->first();
    }

    public function hasVotedComment($Comment){
        return !(is_null($this->getCommentVote($Comment)));
    }

    public function isCommentUpvoted($comment){
        if($this->hasVotedComment($comment)){
            return $this->getCommentVote($comment)->pivot->upvote == true;
        }else{
            return false;
        }
    }

    public function isCommentDownvoted($comment){
        if($this->hasVotedComment($comment)){
            return $this->getCommentVote($comment)->pivot->upvote == false;
        }else{
            return false;
        }
    }

}
