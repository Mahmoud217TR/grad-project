<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Snippet extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'code_snippet',
        'note',
        'status',
        'user_id',
        'language_id',
        'code_id',
    ];

    protected $attributes = [
		'status' => 0
	];

    // Scout Functions

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

    public function getTag($tag){
        return $this->tags->where('id',$tag->id)->first();
    }

    public function isTaggedBy($tag){
        return !is_null($this->getTag($tag));
    }
}
