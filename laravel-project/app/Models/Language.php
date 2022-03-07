<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Language extends Model
{
    use HasFactory,Searchable;
    
    protected $fillable = [
        'name',
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
            'name' => $this->code,
            'description' => $this->note,
            'user_id' => $this->user_id,
        ];
    }

    public function shouldBeSearchable(){
        return $this->isApproved();
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

    public function isApproved(){
        return $this->status == 'approved';
    }
}
