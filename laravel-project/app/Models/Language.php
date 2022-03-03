<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
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

    public function sinppet(){
        return $this->hasOne(sinppet::class);
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
