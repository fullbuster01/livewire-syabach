<div>
    <div class="container full">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $productDetail->nama }}</li>
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
        <!-- Product Shop Section Begin -->
        <section class="product-shop spad page-details mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">
                                    <img class="product-big-img" src="{{ asset('img/mickey1.jpg') }}" alt="" />
                                </div>
                                <div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                        <div class="pt active" data-imgbigurl="{{ asset('img/mickey1.jpg') }}">
                                            <img src="{{ asset('img/mickey1.jpg') }}" alt="" />
                                        </div>

                                        <div class="pt" data-imgbigurl="{{ asset('img/mickey2.jpg') }}">
                                            <img src="{{ asset('img/mickey2.jpg') }}" alt="" />
                                        </div>

                                        <div class="pt" data-imgbigurl="{{ asset('img/mickey3.jpg') }}">
                                            <img src="{{ asset('img/mickey3.jpg') }}" alt="" />
                                        </div>

                                        <div class="pt" data-imgbigurl="{{ asset('img/mickey4.jpg') }}">
                                            <img src="{{ asset('img/mickey4.jpg') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details">
                                    <div class="pd-title">
                                        <span>{{ $productDetail->category->nama }}</span>
                                        <h3>{{ $productDetail->nama }}</h3>
                                    </div>
                                    <div class="pd-desc">
                                        <h4>
                                            Rp. {{ number_format($productDetail->harga) }} &nbsp; &nbsp; &nbsp;
                                            @if ($productDetail->is_ready == 1)
                                                <small><span class="badge badge-success"><i class="fas fa-check"></i>Ready Stok</span></small>
                                            @else
                                                <small><span class="badge badge-danger"><i class="fas fa-times"></i>Stok Habis</span></small>
                                            @endif
                                        </h4>
                                        <div class="mt-4">
                                            {!! $productDetail->deskripsi !!}
                                        </div>
                                    </div>
                                    {{-- <div class="quantity">
                                        <a href="shopping-cart.html" class="primary-btn pd-cart">Add To Cart</a>
                                        
                                    </div> --}}
                                    <form wire:submit.prevent="masukanKeranjang">
                                        <div class="form-group row mt-5">
                                            <div class="col-2 col-form-label"><label for="jumlah_pesanan">Jumlah</label></div>
                                            <div class="col-10"><input wire:model="jumlah_pesanan" type="number" class="form-control" id="jumlah_pesanan" placeholder="Jumlah"></div>
                                            @error('jumlah_pesanan')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group row">
                                            <div class="col-2 col-form-label"><label for="note">Note</label></div>
                                            <div class="col-10"><input wire:model="note" type="text" class="form-control" id="note" placeholder="Note"></div>
                                            @error('note')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                                        <button class="btn btn-dark btn-block mt-2"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Shop Section End -->
    </div>
</div>
