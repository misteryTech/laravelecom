<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TesTingComponents extends Component
{
    public function render()
    {

        $categories = Category::select('id', 'name')
        ->withCount(['products' => function ($query) {
            $query->select(DB::raw('count(*) as product_count'))->groupBy('category_id');
        }])
        ->get();

        return view('livewire.tes-ting-components',['categories'=>$categories]);
    }
}
