<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Spatie\Activitylog\Models\Activity as ModelsActivity;


class ProductsComponents extends Component
{



    use WithFileUploads;
    public $product_picture;
    public $sku;
    public $name;
    public $description;
    public $category;
    public $reg_price;
    public $sale_price;
    public $quantity;
    public $stock_stats='1';


    public function addProduct(){

        $this->validate([
            'product_picture'=>'required',
            'sku'=>'required',
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
            'reg_price'=>'required',
            'sale_price'=>'required',
            'quantity'=>'required',
            'stock_stats'=>'required'
        ]);
        $product = new Product();
        $imageName = Carbon::now()->timestamp.'.'.$this->product_picture->extension();
        $this->product_picture->storeAs('Products',$imageName);
        $product->image = $imageName;
        $product->images = $imageName;
        $product->sku = $this->sku;
        $product->name = $this->name;
        $product->slug = $this->name;
        $product->description = $this->description;
        $product->category_id = $this->category;
        $product->regular_price = $this->reg_price;
        $product->price = $this->sale_price;
        $product->quantity = $this->quantity;
        $product->stock_status = $this->stock_stats;

        $product->save();
        session()->flash('message','Product has been Added!');
        return redirect('products');

    }



    public function render()
    {
        $startDate = Carbon::today();
        $endDate = Carbon::tomorrow();

        $perPage = 10;

        $logsWithProducts = ModelsActivity::join('products', function ($join) {
            $join->on('activity_log.subject_id', '=', 'products.id')
                ->where('activity_log.subject_type', '=', Product::class);
        })
        ->select('products.name','products.SKU', 'activity_log.*') // Adjust the columns as needed
        ->whereBetween('activity_log.created_at', [$startDate, $endDate]) // Corrected the column name
        ->where('activity_log.subject_type', 'App\Models\Product') // Adjusted the where clause
        ->orderBy('activity_log.created_at', 'desc') // Adjusted the column name
        ->paginate($perPage); // Added the missing semicolon



        // $perPage = 10;
        // $activityLogs = ModelsActivity::whereBetween('created_at', [$startDate, $endDate])
        // ->where('subject_type','App\Models\Product')
        // ->orderBy('created_at', 'desc')
        // ->paginate($perPage,);

        $selectCategory = Category::all();

        // return view('livewire.products-components',['selectCategory'=>$selectCategory,
        // 'activityLogs'=>$activityLogs,]);
        return view('livewire.products-components',['selectCategory'=>$selectCategory,'logsWithProducts'=>$logsWithProducts]);
    }
}
