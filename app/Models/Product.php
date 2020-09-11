<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'nama', 'slug', 'harga', 'is_ready', 'berat', 'deskripsi', 'gambar'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class);
    }
}
