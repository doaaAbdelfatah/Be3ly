<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public $product_id, $name, $price, $description, $category_id;

    protected $rules = [
        'name' => 'required',
        'price' => 'required|NUMERIC',
        'category_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.product-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        // $this->validate([
        //     "name" =>"required"
        // ]);

        $this->validate();

        if ($this->product_id)
        {
            $product = Product::find($this->product_id);
        }else{
            $product = new Product();
        }
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->category_id = $this->category_id;
        $product->save();

    }

    function delete($product_id){
        $product = Product::find($product_id);
        if ($product) $product->delete();
    }

    function edit($product_id){
        $product = Product::find($product_id);
        if ($product){
            $this->product_id = $product->id ;
            $this->name = $product->name ;
            $this->price= $product->price ;
            $this->description= $product->description ;
            $this->category_id= $product->category_id ;
        }
    }

    function clear(){
        $this->product_id = null;
        $this->name = null ;
        $this->price=null ;
        $this->description=null ;
        $this->category_id= null ;
    }

}
