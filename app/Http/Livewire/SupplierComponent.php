<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class SupplierComponent extends Component
{

    public $name;
    public $address;
    public $phone;
    public $mobile;

    public $supplier_id;

    protected $rules = [
       'name' => 'required',
       'address' => 'required',
       'phone' => 'required',
       'mobile' => 'required',

   ];

    public function render()
    {
        return view('livewire.supplier-component');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        if($this->supplier_id)
            $supplier = Supplier::find($this->supplier_id);
        else {
            $supplier = new Supplier();
        }
        $supplier->name = $this->name;
        $supplier->phone = $this->phone;
        $supplier->address = $this->address;
        $supplier->mobile = $this->mobile;

        $supplier->save();
    }

    function delete($supplier_id){
        Supplier::destroy($supplier_id);
    }

    function edit($supplier_id){
        $supplier =Supplier::find($supplier_id);
        $this->supplier_id = $supplier->id;
        $this->name = $supplier->name;
        $this->phone = $supplier->phone;
        $this->address = $supplier->address;
        $this->mobile = $supplier->mobile;

    }
}
