<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Field extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'title',
        'info',
        'sheet_id',
    ];

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'info' => $this->info,
            'sheet_id' => $this->sheet_id,
        ];
    }

    public function shouldBeSearchable(){
        return $this->sheet->isPublished();
    }

    // Relations

    public function sheet(){
        return $this->belongsTo(Sheet::class);
    }
}
