<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = ['transaction_id','nama_penerima', 'phone', 'alamat', 'total_harga'];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
