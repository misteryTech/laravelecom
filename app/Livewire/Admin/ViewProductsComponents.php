<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class ViewProductsComponents extends Component
{

    use WithFileUploads;
    use WithPagination;


    public $isOpen = false;

    protected $listeners = ['producId'];






    #[Rule('required')]
    public $SKU;
    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $description;
    #[Rule('required')]
    public $category_id;
    #[Rule('required')]
    public $reg_price;
    #[Rule('required')]
    public $price;
    #[Rule('required')]
    public $quantity;




    public $stock_stats='1';
    public $search = '';
    public $product;
    public $perPage = 10;
    public $image;
    public $images;




    // public function addProduct(){

    //     $validated=$this->validate();
    //     $product = new Product();
    //     $imageName = Carbon::now()->timestamp.'.'.$this->product_pictures->extension();
    //     $this->product_pictures->storeAs('Products',$imageName);
    //     $product->image = $imageName;
    //     $product->images = $imageName;
    //     $product->sku = $this->sku;
    //     $product->name = $this->name;
    //     $product->slug = $this->slug;
    //     $product->description = $this->description;
    //     $product->category_id = $this->category;
    //     $product->regular_price = $this->reg_price;
    //     $product->price = $this->sale_price;
    //     $product->quantity = $this->quantity;
    //     $product->stock_status = $this->stock_stats;
    //     $product->save($validated);
    //     session()->flash('message','Product has been Added!');
    //     return redirect('products');

    // }




    public function render()
    {

        $viewProducts = Product::paginate($this->perPage);
        $categories= Category::all();

        $selectCategory = Category::all();

        return view('livewire.admin.view-products-components',['viewProducts'=>$viewProducts,'categories'=>$categories,'selectCategory'=>$selectCategory]);
    }


    #[On('edit-mode')]
    public function edit($id){

        $this->product = Product::findOrfail($id);

        $this->name=$this->product->name;
        $this->description=$this->product->description;
        $this->reg_price=$this->product->regular_price;
        $this->SKU=$this->product->SKU;
        $this->price=$this->product->price;
        $this->quantity=$this->product->quantity;
        $this->category_id=$this->product->category_id;
        $this->image = $this->product->image; // Assuming 'image' is the column name for the image path or URL


    }


    public function update(){

        $validated=$this->validate();
        $p=Product::find($this->product->id);
        $p->update($validated);

        //  dd($p);
        $this->dispatch('swal',
        ['title'=>'Success!',
        'text'=>'Data updated Cancelled!',
        'icon'=>'success']);
     }


    // public function selectedItem($id, $action){
    //     if($action == 'update'){
    //         $this->product = Product::findOrfail($id);
    //         $this->dispatch('updateModal');
    //         $this->dispatch('prodId');
    //     }else{

    //         $this->dispatch('closeModal');
    //     }

    // }

    #[On('delete-mode')]
    public function delete($id){

        $this->product = Product::findOrfail($id);
        $this->name=$this->product->name;
        $this->description=$this->product->description;
        $this->reg_price=$this->product->regular_price;
        $this->SKU=$this->product->SKU;
        $this->price=$this->product->price;
        $this->quantity=$this->product->quantity;
        $this->category_id=$this->product->category_id;

        $this->dispatch('delete-prompt',
        ['id'=>$id,
        'title'=>'Are you sure you want to delete?' .'ID:'.$id,
        'text'=>'You are about to delete the product:' . ' ' . $this->name,
        'icon'=>'warning']);
    }

    public function close(){
        return redirect('view/product');
    }



    public function confirmDelete($id)
{
       // Find the product by ID
       $product = Product::find($id);

    // Your logic to confirm and delete th  e product using $this->product->id
    // ...
    if ($product) {
        // Delete the prod   $product->delete();uct
        $product->delete();
        // Optionally, emit an even   $product->delete();t to show a success message or perform additional actions
        $this->dispatch('confirmedelete', [
            'icon' => 'success',
            'title' => 'Product deleted successfully',
            'text' => 'The product with ID: ' . $id . ' has been deleted.',
        ]);


    } else {
        // Product not found, handle the case as needed (show an error message, etc.)
        $this->dispatch('delete',
        ['title'=>'Success!',
        'text'=>'Data updated Cancelled!',
        'icon'=>'success']);

    }


    // Optionally, emit an event to show a success message or perform additional actions


}

}
