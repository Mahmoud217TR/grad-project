<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
            0 => 'draft',
            1 => 'published',
            2 => 'archived'
        ];
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
}
