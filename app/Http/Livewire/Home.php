<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $categories = Category::all();
        $products = Product::limit(4)->get();

        return view('livewire.home', compact('categories', 'products'));
    }
}
