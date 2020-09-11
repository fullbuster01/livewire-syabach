<div>
    <div class="container full">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        {{-- @if (session()->has('success'))
            <div class="container my-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif --}}

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksiDetail as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->product->nama }}</td>
                                    <td><img class="img-fluit" src="{{ asset('img/mickey1.jpg') }}" alt="" width="100" /></td>
                                    <td>{{ $detail->jumlah_pesanan }}</td>
                                    <td>Rp. {{ number_format($detail->product->harga) }}</td>
                                    <td><strong>Rp. {{ number_format($detail->total_harga) }}</strong></td>
                                    <td><i wire:click="destroy({{ $detail->id }})" class="fas fa-trash text-danger"></i></td>
                                </tr>
                            @empty
                                <tr><td colspan="7" class="text-center">Data Kosong</td></tr>
                            @endforelse
                            @if ($transaksi)
                                <tr>
                                    <td colspan="5" align="right"><Strong>Total Harga : </Strong></td>
                                    <td><strong>Rp. {{ number_format($transaksi->total_harga) }}</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><Strong>Kode Unik : </Strong></td>
                                    <td><strong>Rp. {{ number_format($transaksi->kode_unik) }}</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><Strong>Total Yang Harus Dibayar : </Strong></td>
                                    <td><strong>Rp. {{ number_format($transaksi->total_harga + $transaksi->kode_unik) }}</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td colspan="2">
                                        <a href="{{ route('checkout') }}" class="btn btn-success btn-blok"><i class="fas fa-arrow-right"></i> Checkout</a>
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
