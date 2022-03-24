<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Report extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'user_id',
    ];

    protected $attributes = [
		'status' => 0,
		'priority' => 1,
	];

    // Scout Functions

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'user_id' => $this->user_id,
        ];
    }

    // Model Functions 

    public static function getStatuses(){
        return [
            0 => 'new',
            1 => 'opened',
            2 => 'solved',
            3 => 'important'
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

    // Relations

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Attributes & Scopes

    public function getStatusAttribute($attribute){
		return self::getStatuses()[$attribute];
	}

    public function scopeNew($query){
		return $query->where('status','0');
	}

    public function scopeOpened($query){
		return $query->where('status','1');
	}

    public function scopeSolved($query){
		return $query->where('status','3');
	}

    public function scopeImportant($query){
		return $query->where('status','4');
	}

    public function scopeHighPriority($query){
        return $query->where('priority','>','5');
    }

    public function scopeLowPriority($query){
        return $query->where('priority','<','5');
    }

    public function isNew(){
        return $this->statusValue() == self::getStatus('new');
    }

    public function isOpened(){
        return $this->statusValue() == self::getStatus('opened');
    }

    public function isSolved(){
        return $this->statusValue() == self::getStatus('solved');
    }

    public function isImportant(){
        return $this->statusValue() == self::getStatus('important');
    }
}
