<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'kode_pemesanan', 'status', 'kode_unik'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function product(){
    //     return $this->belongsTo()
    // }

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class);
    }

    public function checkout(){
        return $this->hasMany(Checkout::class);
    }
}
