<?php

namespace App\Http\Livewire;

use App\Models\Checkout;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Livewire\Component;

class HistoryShow extends Component
{
    public $transaksi, $checkout, $transaksiDetail;
    public function mount($id){
        if (auth()->user()) {
            $this->transaksi = Transaction::findOrFail($id)->first();
            $this->checkout = Checkout::where('transaction_id', $id)->first();
            $this->transaksiDetail = TransactionDetail::where('transaction_id', $id)->get();
        }
        // dd($this->transaksiDetail);
    }
    public function render()
    {
        return view('livewire.history-show');
    }
}
