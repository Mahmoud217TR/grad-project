<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Comment extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'content',
        'user_id',
        'post_id',
        'status',
    ];

    protected $attributes = [
		'status' => 0
	];

    // Scout Functions

    public function toSearchableArray(){
        return [
            'content' => $this->content,
            'user_id' => $this->user_id,
            'post_id' => $this->post_id,
        ];
    }

    public function shouldBeSearchable(){
        return $this->isPublished();
    }

    // Model Functions

    public static function getStatuses(){
        return [
            0 => 'published',
            1 => 'hidden',
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

    public function post(){
        return $this->belongsTo(Post::class);
    }

    // Attributes & Scopes

    public function getStatusAttribute($attribute){
		return self::getStatuses()[$attribute];
	}

    public function scopePublished($query){
		return $query->where('status','0');
	}

    public function scopeHidden($query){
		return $query->where('status','1');
	}

    public function scopeArchived($query){
		return $query->where('status','2');
	}

    public function isPublished(){
        return $this->statusValue() ==  self::getStatus('published');
    }

    public function isHidden(){
        return $this->statusValue() ==  self::getStatus('hidden');
    }

    public function isArchived(){
        return $this->statusValue() ==  self::getStatus('archived');
    }
}
