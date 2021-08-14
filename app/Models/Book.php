<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Book extends Model
{
    protected $primaryKey = 'isbn';

    public function reviews(){
        return $this->hasMany(Review::class, 'book_id');
    }
}
