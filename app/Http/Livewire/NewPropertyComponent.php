<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;

class NewPropertyComponent extends Component
{

    public $name ;
    public $property_id;

    protected $rules = [
        'name' => 'required|min:3',
    ];


    public function render()
    {
        return view('livewire.new-property-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();
        if ($this->property_id){
            $property =Property::find($this->property_id);

        }else{
            $property = new Property();
        }
        $property->name = $this->name;
        $property->save();
}

function delete($property_id){
    Property::destroy($property_id);
}

function edit($property_id){
    $property =Property::find($property_id);
    $this->property_id = $property->id;
    $this->name = $property->name;
}

}
