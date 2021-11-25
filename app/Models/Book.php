<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function book_types(){
        return $this->belongsToMany(BookType::class);
    }

    public function class_level(){
        return $this->belongsTo(ClassLevel::class);
    }

    public function academic(){
        return $this->belongsTo(Academic::class);
    }

    public function scopeInfo($query)
    {
        return $query->with('book_types', 'class_level', 'academic');
    }
}
