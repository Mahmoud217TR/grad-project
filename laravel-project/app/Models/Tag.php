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
}
