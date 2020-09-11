<div>
    <div class="container full">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @if ($namaCategory)
                            <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $namaCategory }}</li>
                        @else
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('products') }}" class="text-dark">Products</a></li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            <div class="col">
                @if ($namaCategory)
                    <h3>{{ $title }} : <strong>{!! $namaCategory !!}</strong></h3>
                @else
                    <h3>{{ $title }}</h3>
                @endif
            </div>
            <div class="col-3">
                <div class="input-group mb-3">
                    <input wire:model="search" type="text" class="form-control" placeholder="Search">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <section class="products mt-5">
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
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
</div>
