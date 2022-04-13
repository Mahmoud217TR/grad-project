<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Log extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'title',
        'data',
        'type',
    ];

    protected $attributes = [
		'type' => 0
	];

    // Scout Functions

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'data' => $this->data,
            'type' => $this->type,
        ];
    }

    // Model Functions 

    public static function getTypes(){
        return [
            0 => 'general',
            1 => 'role change',
            2 => 'insertion',
            3 => 'modification',
            4 => 'deletion',
            5 => 'user related',
        ];
    }

    public static function getType($status){
        return array_search($status,self::getTypes());
    }

    private static function inTypesRange($num){
        return in_array($num,array_keys(self::getTypes()));
    }

    private static function inTypes($status){
        return in_array($status,self::getTypes());
    }

    public static function getTypeValue($status){
        if(self::inTypes($status)){
            return array_search($status,self::getTypes());
        }else{
            return false;
        }
    }

    public function TypeValue(){
        return $this->getTypeValue($this->type);
    }

    // Attributes & Scopes

    public function getTypeAttribute($attribute){
		return self::getTypes()[$attribute];
	}

    public function scopeGeneral($query){
		return $query->where('type','0');
    }

    public function scopeRoleChange($query){
		return $query->where('type','1');
	}
    
    public function scopeInsertion($query){
		return $query->where('type','2');
    }

    public function scopeModification($query){
		return $query->where('type','3');
	}

    public function scopeDeletion($query){
		return $query->where('type','4');
    }

    public function scopeUserRelated($query){
		return $query->where('type','5');
	}
}
