<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'status',
    ];
    
    protected $attributes = [
		'status' => 0
	];

    // Scout Functions

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $this->user_id,
        ];
    }

    public function shouldBeSearchable(){
        return $this->isPublished();
    }

    // Model Functions

    public static function getStatuses(){
        return [
            0 => 'drafted',
            1 => 'published',
            2 => 'archived'
        ];
    }

    public static function getStatus($status){
        return array_search($status,self::getStatuses());
    }

    private static function inStatusesRange($num){
        return in_array($num,array_keys(self::getStatuses()));
    }

    private static function inStatuses($status){
        return in_array($status,self::getStatuses());
    }

    public static function getStatusValue($status){
        if(self::inStatuses($status)){
            return array_search($status,self::getStatuses());
        }else{
            return false;
        }
    }

    public function statusValue(){
        return $this->getStatusValue($this->status);
    }

    // Relations

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function userVotes(){
        return $this->belongsToMany(User::class,'post_user','post_id')->withPivot('upvote');
    }

    public function userUpvotes(){
        return $this->UserVotes->where('pivot.upvote',true);
    }

    public function userDownvotes(){
        return $this->UserVotes->where('pivot.upvote',false);
    }

    // Attributes & Scopes

    public function getStatusAttribute($attribute){
		return self::getStatuses()[$attribute];
	}

    public function scopeDrafted($query){
		return $query->where('status','0');
	}

    public function scopePublished($query){
		return $query->where('status','1');
	}

    public function scopeArchived($query){
		return $query->where('status','2');
	}

    public function isDrafted(){
        return $this->statusValue() ==  self::getStatus('drafted');
    }

    public function isPublished(){
        return $this->statusValue() ==  self::getStatus('published');
    }

    public function isArchived(){
        return $this->statusValue() ==  self::getStatus('archived');
    }
}
