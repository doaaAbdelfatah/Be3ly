<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;

class LocationComponent extends Component
{

    public $name ;
    public $location_id;

    protected $rules = [
        'name' => 'required',
    ];


    public function render()
    {
        return view('livewire.location-component');
    }




    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();
        if ($this->location_id){
            $location =Location::find($this->location_id);

        }else{
            $location = new Location();
        }
        $location->name = $this->name;
        $location->save();
}

function delete($location_id){
    Location::destroy($location_id);
}

function edit($location_id){
    $location =Location::find($location_id);
    $this->location_id = $location->id;
    $this->name = $location->name;
}



}
