<?php

namespace App\Http\Livewire;

use App\Models\PurchasingOrderDetail;
use App\Models\Stock;
use Livewire\Component;

class PurchasingOrderShowComponent extends Component
{

    public $order;

    public $product_id, $unit_price, $quantity, $unit_id;
    protected $rules = [
        'product_id' => 'required',
        'unit_price' => 'required',
        'quantity' => 'required',
        'unit_id' => 'required',
    ];

    protected $listeners =[
        "refresh_me"=>'$refresh',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.purchasing-order-show-component');
    }

    public function add(){
        $this->validate();

        $orderDetail = new PurchasingOrderDetail();
        $orderDetail->purchasing_order_id = $this->order->id;
        $orderDetail->product_id = $this->product_id;
        $orderDetail->unit_price = $this->unit_price;
        $orderDetail->quantity = $this->quantity;
        $orderDetail->unit_id = $this->unit_id;
        $orderDetail->save();

        $this->order->total_invoice=  $this->order->total_invoice + ( $orderDetail->unit_price *$orderDetail->quantity );
        $this->order->updated_by =auth()->user()->id;
        $this->order->save();

        $this->emit("refresh_me");
    }

    public function edit(){
        $this->order->status ='delivered' ;
        $this->order->save();

        // if ($this->stock_id)
        // {
        //     $stock = Stock::find($this->stock_id);
        // }else{
        //     $stock = new Stock();
        // }
        //branch_id, product_id, min_quantity_in_stock, quantity, unit_id, avg_price
        foreach($this->order->purchasing_order_details as $orderDetail){
            $stock = new Stock();
            $stock->branch_id = $this->order->branch_id;
            $stock->product_id = $orderDetail->product_id;
            $stock->quantity = $orderDetail->quantity;
            $stock->unit_id = $orderDetail->unit_id;
            $stock->avg_price = $orderDetail->unit_price;
            $stock->save();
        }


    }
}
