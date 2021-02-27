<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;

class StockComponent extends Component
{
    public $stock_id;
    public $name ;
    public $branch_id ;
    public $product_id ;
    public $min_quantity_in_stock ;
    public $quantity ;
    public $unit_id ;
    public $avg_price ;


    protected $rules = [

        'stock_id'=>'required',
        'name' => 'required',
        'branch_id' => 'required',
        'product_id' => 'required',
        'quantity' => 'required',
        'unit_id' => 'required',
        'avg_price' => 'required',

    ];

    public function render()
    {
        return view('livewire.stock-component');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){


        $this->validate();

        if ($this->stock_id)
        {
            $stock = Stock::find($this->stock_id);
        }else{
            $stock = new Stock();
        }
        $stock->name = $this->name;
        $stock->price = $this->price;
        $stock->description = $this->description;
        $stock->category_id = $this->category_id;
        $stock->save();

    }

    function delete($stock_id){
        $stock = Stock::find($stock_id);
        if ($stock) $stock->delete();
    }


    function edit($stock_id){
        $stock = Stock::find($stock_id);
        if ($stock){
            $this->stock_id = $stock->id ;
            $this->name = $stock->name ;
            $this->branch_id= $stock->branch_id ;
            $this->product_id= $stock->product_id ;
            $this->quantity= $stock->quantity ;
            $this->unit_id= $stock->unit_id ;
            $this->avg_price= $stock->avg_price ;

        }
    }


    function clear(){
        $this->stock_id = null;
        $this->name = null ;
        $this->branch_id=null ;
        $this->product_id=null ;
        $this->quantity= null ;
        $this->unit_id= null ;
        $this->avg_price= null ;
    }

}
