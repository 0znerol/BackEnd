<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'category', 'relesed', 'author_name', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    // protected $casts = [
    //     'created_at' => 'datetime'

    // ];
}
