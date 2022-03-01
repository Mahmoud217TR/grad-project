<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function snippets(){
        return $this->hasMany(Snippet::class);
    }
}
