<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NewProductPropertyComponent extends Component
{
    public $product_id ;
    public $property_id;
    public $value;
    
    protected $rules = [
        'product_id' => 'required',
        'property_id' => 'required',
        'value' => 'nullable|min:2',
    ];
    public function render()
    {
        return view('livewire.new-product-property-component');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        $productproperty = new ProductProperty();
        $productproperty->product_id = $this->product_id;
        $productproperty->property_id = $this->property_id;
        $productproperty->value = $this->value;
        $productproperty->save();
}


    
}
