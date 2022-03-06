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
}
