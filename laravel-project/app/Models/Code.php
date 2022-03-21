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
    ];

    protected $attributes = [
		'status' => 0
	];

    // Scout Functions

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'description' => $this->description,
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
