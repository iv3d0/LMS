<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'isbn', 'published_date', 'author_id'];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
