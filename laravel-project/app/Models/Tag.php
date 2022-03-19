<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'name',
        'description',
    ];

    // Scout Functions

    public function toSearchableArray(){
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    // Relations

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function snippets(){
        return $this->belongsToMany(Snippet::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class,'user_follow','object_id')->where('type',2);
    }

    // Functions

    public function getTaggedPost($post){
        return $this->posts->where('id',$post->id)->first();
    }

    public function isTaggedPost($post){
        return !is_null($this->getTaggedPost($post));
    }

    
    public function getTaggedSnippet($snippet){
        return $this->snippets->where('id',$snippet->id)->first();
    }

    public function isTaggedSnippet($snippet){
        return !is_null($this->getTaggedPost($snippet));
    }
}
