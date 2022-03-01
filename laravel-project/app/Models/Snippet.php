<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function code(){
        return $this->belongsTo(Code::class);
    }

    public function language(){
        return $this->belongsTo(Language::class);
    }
}
