<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;

class Profile extends Pivot
{
    use HasFactory,Searchable;
    
    protected $fillable = [
        'bio',
        'profile_pic',
    ];

    protected $attributes = [
		'visits' => 0,
        'bio' => "The user didn't set a Bio yet."
	];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
