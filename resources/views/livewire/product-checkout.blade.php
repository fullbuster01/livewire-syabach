<div>
    <div class="container full">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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

        <div class="row mt-3">
            <div class="col">
                <a href="{{ route('keranjang') }}" class="btn btn-dark btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-8">
                <h4>Informasi Pembayaran</h4>
                <hr>
                <p>Untuk pembayaran silahkan transfer direkening dibawah ini sebesar : <strong>Rp. {{ number_format($totalHarga) }}</strong></p>
                <div class="media">
                    <img src="{{ asset('img/mickey1.jpg') }}" class="mr-3" alt="..." width="80">
                    <div class="media-body">
                        <h5 class="mt-0">Bank BCA</h5>
                        No. Rekening 0000111122 atas nama <strong>FullBuster</strong>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <h4>Informasi Pengiriman</h4>
                <hr>
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <div class="form-group">
                        <label for="nama_penerima">Nama Penerima</label>
                        <input wire:model="nama_penerima" type="text" class="form-control" id="nama_penerima" placeholder="Nama Penerima">
                        @error('nama_penerima')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        <label for="phone">No. Hp</label>
                        <input wire:model="phone" type="text" class="form-control" id="phone" placeholder="No. Hp">
                        @error('phone')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea wire:model="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat"></textarea>
                        @error('alamat')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-block mt-2"><i class="fas fa-arrow-right"></i> Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>
