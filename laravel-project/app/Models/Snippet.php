<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Snippet extends Model
{
    use HasFactory,Searchable;

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

    public function toSearchableArray(){
        return [
            'code' => $this->code,
            'note' => $this->note,
            'user_id' => $this->user_id,
            'code_id' => $this->code_id,
            'language_id' => $this->language_id,
        ];
    }

    public function shouldBeSearchable(){
        return $this->isApproved();
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

    public function isApproved(){
        return $this->status == 'approved';
    }
}
