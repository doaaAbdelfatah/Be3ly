<?php

namespace App\Http\Livewire;

use App\Models\PurchasingOrder;
use Livewire\Component;

class PurchasingOrderComponent extends Component
{
    public $supplier_id ;
    public $created_by ;
    public $total_invoice ;
    public $status ;
    public $updated_by ;
    public $received_at ;
    public $branch_id ;
    public $purchasing_id ;

    protected $rules = [
        'supplier_id' => 'required',
        'created_by' => 'required',
        'total_invoice' => 'nullable',
        'status' => 'nullable',
        'updated_by' => 'required',
        'received_at' => 'nullable',
        'branch_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.purchasing-order-component');
    }
    // real time updated

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Save Order
    function save(){

        $this->validate();

        if ($this->purchasing_id){
            $purchasing = PurchasingOrder::find($this->purchasing_id);
        }else{
            $purchasing = new PurchasingOrder();
        }
        $purchasing->supplier_id = $this->supplier_id ;
        $purchasing->created_by = $this->created_by ;
        $purchasing->total_invoice = $this->total_invoice ;
        $purchasing->status = $this->status ;
        $purchasing->updated_by = $this->updated_by ;
        $purchasing->received_at = $this->received_at ;
        $purchasing->branch_id = $this->branch_id ;
        $purchasing->save();

        $this->clear();

    }
    //Delte item function of Shipping Companies

    function delete($purchasing_id){
        PurchasingOrder::destroy($purchasing_id);
    }

    //Edit Item function of Shipping Companies

    function edit($purchasing_id){
        $purchasing = PurchasingOrder::find($purchasing_id);


        $this->purchasing_id = $purchasing->id;
        $this->supplier_id = $purchasing->supplier_id;
        $this->created_by = $purchasing->created_by;
        $this->total_invoice = $purchasing->total_invoice;
        $this->status = $purchasing->status;
        $this->updated_by = $purchasing->updated_by;
        $this->received_at = $purchasing->received_at;
        $this->branch_id = $purchasing->branch_id;

    }
    function clear(){
        $this->purchasing_id = null ;
        $this->supplier_id = null ;
        $this->created_by = null ;
        $this->total_invoice = null ;
        $this->status = null ;
        $this->updated_by = null ;
        $this->received_at = null ;
        $this->branch_id = null ;
    }
}
