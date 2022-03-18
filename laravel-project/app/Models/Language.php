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

    // Scout Functions

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

    // Model Functions

    public static function getStatuses(){
        return [
            0 => 'requested',
            1 => 'approved'
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

    public function statusValue(){
        return $this->getStatusValue($this->status);
    }

    // Relations

    public function snippets(){
        return $this->hasMany(Snippet::class);
    }
    
    public function followers(){
        return $this->belongsToMany(User::class,'user_follow','object_id')->where('type',1);
    }

    // Attributes & Scopes
    
    public function getStatusAttribute($attribute){
		return self::getStatuses()[$attribute];
	}

    public function scopeRequested($query){
		return $query->where('status','0');
	}

    public function scopeApproved($query){
		return $query->where('status','1');
	}

    public function isApproved(){
        return $this->statusValue() == self::getStatus('approved');
    }

    public function isRequested(){
        return $this->statusValue() == self::getStatus('requested');
    }
}
