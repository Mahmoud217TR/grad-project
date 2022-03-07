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

    public function getStatus(){
        return [
            0 => 'drafted',
            1 => 'published',
            2 => 'archived'
        ];
    }

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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function getStatusAttribute($attribute){
		return $this->getStatus()[$attribute];
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
        return $this->status == 'drafted';
    }

    public function isPublished(){
        return $this->status == 'published';
    }

    public function isArchived(){
        return $this->status == 'archived';
    }
}
