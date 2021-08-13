<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviewedBook()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
