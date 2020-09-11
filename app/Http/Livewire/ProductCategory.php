<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategory extends Component
{
    use WithPagination;

    public $search, $categorySlug;
    protected $updateQueryString = ['search'];
    //ini jika user search diurl
    public function mount(Category $category)
    {
        $this->search = request()->query('search', $this->search);
        if ($category) {
            $this->categorySlug = $category;
        }

    }
    // ini supaya bisa search item yang berada di page lain
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $title = 'category';
        $namaCategory = $this->categorySlug->nama;
        $products = $this->search == null ? $this->categorySlug->product()->latest()->paginate(12) : $this->categorySlug->product()->where('nama', 'like', '%' . $this->search . '%')->paginate(12);;
        return view('livewire.product-index', compact('products', 'title', 'namaCategory'));
    }
}
