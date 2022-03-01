<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'note',
        'status',
        'user_id',
        'language_id',
        'code_id',
    ];

    public function sinppet(){
        return $this->hasOne(sinppet::class);
    }
}
