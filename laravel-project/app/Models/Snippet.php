<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'note',
        'status',
        'user_id',
        'language_id',
        'code_id',
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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function code(){
        return $this->belongsTo(Code::class);
    }

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
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
