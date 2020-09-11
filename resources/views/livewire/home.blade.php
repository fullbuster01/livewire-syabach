<div>
    <div class="container full">
        <div class="banner">
            <img src="{{ asset('img/banner.jpg') }}" alt="">
        </div>

        <section class="category mt-4">
            <h3><strong>Pilih Category</strong></h3>
            <div class="row d-flex justify-content-center">
                @foreach ($categories as $category)
                    <div class="col-3">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <a href="{{ route('products.category', $category->slug) }}"><img src="{{ asset('img/banner.jpg') }}" class="img-fluit category-image" alt=""></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="products mt-5">
            <h3>
                <strong>Best Products</strong>
                <a href="{{ route('products') }}" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Lihat Semua</a>
            </h3>
            <div class="row d-flex justify-content-center">
                @foreach ($products as $product)
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href=""><img src="{{ asset('img/banner.jpg') }}" class="img-fluit category-image" alt=""></a>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <h5><strong>{{ $product->nama }}</strong></h5>
                                        <h5>Rp. {{ number_format($product->harga) }}</h5>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <a href="{{ route('products.detail', $product->slug) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
