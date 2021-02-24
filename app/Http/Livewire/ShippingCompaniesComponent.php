<?php

namespace App\Http\Livewire;

use App\Models\ShippingCompany;
use Livewire\Component;
use Livewire\WithPagination;

class ShippingCompaniesComponent extends Component
{
    use WithPagination;

    public $name ;
    public $address ;
    public $phone ;
    public $mobile ;
    public $shipping_id ;

    protected $rules = [
        'name' => 'required|min:2',
        'phone' => 'nullable|min:9',
        'address' => 'nullable',
        'mobile' => 'nullable|min:7',
    ];
    public function render()
    {
        return view('livewire.shipping-companies-component');
    }
    // real time updated

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    //Save Item function of Shipping Companies

    public function save(){

        $this->validate();

        if ($this->shipping_id) {
            $shipping = ShippingCompany::find($this->shipping_id);
        } else {
            $shipping = new ShippingCompany();
        }
        $shipping->name = $this->name;
        $shipping->phone = $this->phone;
        $shipping->address = $this->address;
        $shipping->mobile = $this->mobile;
        $shipping->save();
    }
    //Delte item function of Shipping Companies

    function delete($shipping_id){
        ShippingCompany::destroy($shipping_id);
    }

    //Edit Item function of Shipping Companies

    function edit($shipping_id){
        $shipping =ShippingCompany::find($shipping_id);
        $this->shipping_id = $shipping->id;
        $this->name = $shipping->name;
        $this->phone = $shipping->phone;
        $this->address = $shipping->address;
        $this->mobile = $shipping->mobile;
    }

}
