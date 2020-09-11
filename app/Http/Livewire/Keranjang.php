<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Livewire\Component;

class Keranjang extends Component
{
    protected $transaksi, $transaksiDetail= [];
    // public function mount(){
    //     if (!auth()->user()) {
    //         return redirect()->route('login');
    //     }
    // }
    public function render()
    {
        if (auth()->user()) {
            $this->transaksi = Transaction::where('user_id', auth()->user()->id)->where('status', 0)->first();
            if($this->transaksi){
                $this->transaksiDetail = TransactionDetail::where('transaction_id', $this->transaksi->id)->get();
            }
        }
        return view('livewire.keranjang', [
            'transaksi' => $this->transaksi,
            'transaksiDetail' => $this->transaksiDetail
        ]);
    }

    public function destroy($id){
        $detail = TransactionDetail::findOrFail($id);
        $detail->delete();
        $transaksi = Transaction::where('id', $detail->transaction_id)->where('status',0)->first();
        $transaksi->total_harga = $transaksi->total_harga - $detail->total_harga;
        $transaksi->update();
        if ($transaksi->total_harga == 0) {
            $transaksi->delete();
        }
        $this->emit('masukKeranjang');
        $this->emit('alert', ['type' => 'success', 'message' => 'Sukses menghapus item dikeranjang']);
    }
}
