<div>
    <div class="container full">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">History</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <div class="col">
                <a href="{{ route('history') }}" class="btn btn-dark btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Penerima</th>
                                <th>Pesanan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Nomer Hp</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $checkout->nama_penerima }}</td>
                                    <td>
                                        @foreach ($transaksiDetail as $item)
                                            <ul>
                                                <li>{{ $item->product->nama }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($transaksiDetail as $item)
                                            <ul>
                                                <li>{{ $item->product->harga }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($transaksiDetail as $item)
                                            <ul>
                                                <li>{{ $item->jumlah_pesanan }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>{{ $checkout->phone }}</td>
                                    <td>{{ $checkout->alamat }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
