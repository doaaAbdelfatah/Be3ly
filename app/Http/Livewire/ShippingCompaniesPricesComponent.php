<?php

namespace App\Http\Livewire;

use App\Models\ShippingCompany;
use App\Models\ShippingCompanyPrice;
use Livewire\Component;

class ShippingCompaniesPricesComponent extends Component
{

    public $name ;
    public $location ;
    public $amount ;
    public $shipping_price_id ;

    protected $rules = [
        'name' => 'required',
        'location' => 'required',
        'amount' => 'required|min:2',
    ];

    public function render()
    {
        $shipping_company =ShippingCompany::all();
        return view('livewire.shipping-companies-prices-component' , ["shipping_company"=>$shipping_company] );
    }

    // real time updated

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    //Save Item function of Shipping Companies

    public function save(){

        $this->validate();

        if ($this->shipping_price_id) {
            $shipping_price = ShippingCompanyPrice::find($this->shipping_price_id);
        } else {
            $shipping_price = new ShippingCompanyPrice();
        }
        $shipping_price->shipping_company_id = $this->name;
        $shipping_price->location_id = $this->location;
        $shipping_price->amount = $this->amount;
        $shipping_price->save();
    }
    //Delte item function of Shipping Companies

    function delete($shipping_price_id){
        ShippingCompanyPrice::destroy($shipping_price_id);
    }

    //Edit Item function of Shipping Companies

    function edit($shipping_price_id){
        $shipping_price =ShippingCompanyPrice::find($shipping_price_id);
        $this->shipping_price_id = $shipping_price->id;
        $this->name = $shipping_price->name;
        $this->location = $shipping_price->location;
        $this->amount = $shipping_price->amount;
    }
}
