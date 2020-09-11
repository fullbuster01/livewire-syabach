<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;
    protected $updateQueryString = ['search'];
    //ini jika user search diurl
    public function mount()
    { 
        $this->search = request()->query('search', $this->search);
        
    }
    // ini supaya bisa search item yang berada di page lain
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $title = 'All Products';
        $namaCategory =null;
        $products = $this->search == null ? Product::latest()->paginate(12) : Product::where('nama', 'like', '%' . $this->search . '%')->paginate(12);;
        return view('livewire.product-index', compact('products', 'title', 'namaCategory'));
    }
}
