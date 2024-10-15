<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'judul',
        'penulis',
        'penerbit_id',
        'tanggal_rilis',
        'stok',
        'harga',
        'deskripsi_buku'
    ];

    public function  penerbit(){
        return $this->belongsTo(Publisher::class, 'penerbit_id');
    }
    public function categorybook(){
        return $this->belongsToMany(Category::class, 'categorybooks','book_id','category_id');
    }
}
