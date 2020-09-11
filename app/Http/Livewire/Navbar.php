<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Livewire\Component;

class Navbar extends Component
{
    public $jumlah = 0;
    protected $listeners = [
        'masukKeranjang' => 'keranjang',
        'alert' => 'alert'
    ];

    public function mount(){
        if (auth()->user()) {
            $transaksi = Transaction::where('user_id', auth()->user()->id)->where('status', 0)->first();
            if ($transaksi) {
                $this->jumlah = TransactionDetail::where('transaction_id', $transaksi->id)->count();
            }
        }
    }

    public function render()
    {
        $categories = Category::orderBy('nama')->get();
        $jumlah_pesanan = $this->jumlah;
        return view('livewire.navbar', compact('categories', 'jumlah_pesanan'));
    }

    public function keranjang(){
        if (auth()->user()) {
            $transaksi = Transaction::where('user_id', auth()->user()->id)->where('status', 0)->first();
            if ($transaksi) {
                $this->jumlah = TransactionDetail::where('transaction_id', $transaksi->id)->count();
            }else{
                $this->jumlah = 0;
            }
        }
    }

    public function alert(){
        
    }
}
