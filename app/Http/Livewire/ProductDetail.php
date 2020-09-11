<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Livewire\Component;

class ProductDetail extends Component
{
    public $productDetail;
    public $jumlah_pesanan, $note;

    public function mount(Product $product)
    {
        if ($product) {
            $this->productDetail = $product;
        }
    }
    
    public function render()
    {
        return view('livewire.product-detail');
    }

    public function masukanKeranjang(){
        $this->validate([
            'jumlah_pesanan' => 'required|integer',
            // 'kode_pemesanan' => 'unique:transactions'
        ]);

        // validasi jika belum login
        if (!auth()->user()) {
            return redirect()->route('login');
        }

        // menghitung total harga
        $totalHarga = $this->jumlah_pesanan * $this->productDetail->harga;

        // mengecek apakah user punya data transaksi utama yg statusnya 0
        $transaksi = Transaction::where('user_id', auth()->user()->id)->where('status', 0)->first();
        if (empty($transaksi)) {
            $transaksi = Transaction::create([
                'user_id' => auth()->user()->id,
                'kode_pemesanan' => 'SB'. mt_rand(1, 100000). mt_rand(1000, 999999),
                'status' => 0,
                'total_harga' => $totalHarga,
                'kode_unik' => mt_rand(1, 200)
            ]);
            
        }
        // else{
        //     $transaksi->total_harga = $transaksi->total_harga . $totalHarga;
        //     $transaksi->update();
        // }

        // menyimpan transaksi detail
        $transaksiDetail = TransactionDetail::create([
            'transaction_id' => $transaksi->id,
            'product_id' => $this->productDetail->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'total_harga' => $totalHarga
        ]);

        // ini untuk menupdate total harga di tabel Transactions
        $transaksi->total_harga = $transaksi->total_harga + $totalHarga;
        $transaksi->update();

        $this->emit('masukKeranjang');
        $this->jumlah_pesanan = null; //mengembalikan inputan seperti semula
        $this->emit('alert', ['type' => 'success', 'message' => 'Sukses Masuk Keranjang']);
        return redirect()->back();
    }

    // public function resetJumlah(){
    //     $this->jumlah_pesanan = null;
    // }
}
