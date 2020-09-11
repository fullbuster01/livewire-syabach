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
        <div class="row mt-5">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pesan</th>
                                <th>Kode Pemesanan</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @foreach ($checkout as $c)
                                            @if ($c->transaction_id === $item->id)
                                                {{ $c->created_at }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $item->kode_pemesanan }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                        Belum Lunas
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($checkout as $i)
                                            @if ($i->transaction_id === $item->id)
                                                <strong>Rp. {{ number_format($i->total_harga) }}</strong>
                                            @endif
                                        @endforeach
                                        {{-- Rp. {{ number_format($item->checkout->total_harga) }} --}}
                                    </td>
                                    <td><a href="{{ route('history.show', $item->id) }}" class="btn btn-info"><i class="fas fa-eye"></i> View Detail</a></td>
                                </tr>
                            @empty
                                <tr><td colspan="7" class="text-center">Data Kosong</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <p>Untuk pembayaran silahkan transfer direkening dibawah ini :</p>
                        <div class="media">
                            <img src="{{ asset('img/mickey1.jpg') }}" class="mr-3" alt="..." width="80">
                            <div class="media-body">
                                <h5 class="mt-0">Bank BCA</h5>
                                No. Rekening 0000111122 atas nama <strong>FullBuster</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
