<?php

namespace App\Http\Livewire;

use App\Models\Checkout;
use App\Models\Transaction;
use Livewire\Component;

class ProductCheckout extends Component
{
    public $totalHarga, $nama_penerima, $alamat, $phone;

    public function mount()
    {
        if (!auth()->user()) {
            return redirect()->route('login');
        }
        $transaksi = Transaction::where('user_id', auth()->user()->id)->where('status', 0)->first();

        if (!empty($transaksi)) {
            $this->totalHarga = $transaksi->total_harga + $transaksi->kode_unik;
        } else {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.product-checkout');
    }

    public function store()
    {
        $this->validate([
            'nama_penerima' => 'required|min:3',
            'phone' => 'required',
            'alamat' => 'required|min:15',
        ]);
        $transaksi = Transaction::where('user_id', auth()->user()->id)->where('status', 0)->first();
        Checkout::create([
            'transaction_id' => $transaksi->id,
            'nama_penerima' => $this->nama_penerima,
            'phone' => $this->phone,
            'alamat' => $this->alamat,
            'total_harga' => $this->totalHarga
        ]);

        //update data transaksi
        $transaksi->status = 1;
        $transaksi->update();
        $this->emit('masukKeranjang');
        $this->emit('alert', ['type' => 'success', 'message' => 'Sukses Checkout']);

        return redirect()->route('history');
    }
}
