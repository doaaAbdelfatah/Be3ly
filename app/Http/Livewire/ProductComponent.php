<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;

    public $product_id, $name, $price, $description, $category_id ,$at;
    public $search ,$from_price ,$to_price ,$search_at;

    public $items ;
    protected $rules = [
        'name' => 'required',
        'price' => 'required|NUMERIC',
        'at' => 'nullable|Date|before_or_equal:tomorrow',
        'category_id' => 'required',
    ];


    public function mount(){
        $this->items = collect();
    }
    
    public function render()
    {
        $qry = Product::query();
        if($this->search)
        {
            $this->resetPage();

            // $qry->where("name" ,$this->search);
            $qry->where("name" , "like" , "%".$this->search."%");
            //$qry->where("name" ,"!=" ,$this->search);
        }
        if( $this->from_price ){
            $this->resetPage();
           $qry->where("price", ">=" ,$this->from_price);
        }
        if( $this->to_price ){
            $this->resetPage();
           $qry->where("price", "<=" ,$this->to_price);
        }
        if( $this->search_at ){
            $this->resetPage();
           $qry->whereDate("at", "<=" ,$this->search_at);
        }
        // if( $this->from_price && $this->to_price){
        //     $this->resetPage();
        //    $qry->whereBetween("price", [$this->from_price, $this->to_price]);
        // }
        $products = $qry->paginate(10);

        return view('livewire.product-component' ,["products" => $products  ] );
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
        $product->at = $this->at;
        $product->description = $this->description;
        $product->category_id = $this->category_id;
        $product->save();
        $this->clear();

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
            $this->at = $product->at ;
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

    public function test (){
        $this->items->push($this->name);
        Log::info(json_encode( $this->items));

    }

}
