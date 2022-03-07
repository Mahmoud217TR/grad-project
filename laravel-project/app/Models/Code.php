<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Code extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    protected $attributes = [
		'status' => 0
	];

    public function getStatus(){
        return [
            0 => 'requested',
            1 => 'approved'
        ];
    }

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => $this->user_id,
        ];
    }

    public function shouldBeSearchable(){
        return $this->isApproved();
    }

    public function snippets(){
        return $this->hasMany(Snippet::class);
    }

    public function getStatusAttribute($attribute){
		return $this->getStatus()[$attribute];
	}

    public function scopeRequested($query){
		return $query->where('status','0');
	}

    public function scopeApproved($query){
		return $query->where('status','1');
	}

    public function isApproved(){
        return $this->status == 'approved';
    }
}
