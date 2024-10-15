<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category'
    ];
    
    public function categorybook(){
        return $this->belongsToMany(Category::class, 'categorybooks','category_id','book_id');
    }
}
