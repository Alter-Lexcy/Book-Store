<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorybook extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_id',
        'book_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function book(){
        return $this->belongsTo(Book::class,'book_id');
    }
}
