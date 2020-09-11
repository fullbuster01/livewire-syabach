<?php

namespace App\Http\Livewire;

use App\Models\Checkout;
use App\Models\Transaction;
use Livewire\Component;

class History extends Component
{
    public $transaksi, $checkout;
    public function render()
    {
        if (auth()->user()) {
            $this->transaksi = Transaction::where('user_id', auth()->user()->id)->where('status', '!=' ,0)->latest()->get();
            $this->checkout = Checkout::latest()->get();
        }
        return view('livewire.history');
    }
}
