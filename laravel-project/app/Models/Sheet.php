<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Sheet extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    protected $attributes = [
		'status' => 0
	];

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => $this->user_id,
        ];
    }

    public function shouldBeSearchable(){
        return $this->isPublished();
    }

    // Model Functions

    public static function getStatuses(){
        return [
            0 => 'draft',
            1 => 'published',
            2 => 'archived'
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

    public function fields(){
        return $this->hasMany(Field::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    // Attributes & Scopes

    public function getStatusAttribute($attribute){
		return self::getStatuses()[$attribute];
	}

    public function scopeDrafted($query){
		return $query->where('status','0');
	}

    public function scopePublished($query){
		return $query->where('status','1');
	}

    public function scopeArchived($query){
		return $query->where('status','2');
	}

    public function isDrafted(){
        return $this->statusValue() == self::getStatus('draft');
    }

    public function isPublished(){
        return $this->statusValue() == self::getStatus('published');
    }

    public function isArchived(){
        return $this->statusValue() == self::getStatus('archived');
    }

    public function getTag($tag){
        return $this->tags->where('id',$tag->id)->first();
    }

    public function isTaggedBy($tag){
        return !is_null($this->getTag($tag));
    }
}
