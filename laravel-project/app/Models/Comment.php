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

    public function getStatus(){
        return [
            0 => 'published',
            1 => 'hidden',
            1 => 'archived'
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function getStatusAttribute($attribute){
		return $this->getStatus()[$attribute];
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
}
