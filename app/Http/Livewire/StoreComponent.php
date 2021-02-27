<?php

namespace App\Http\Livewire;

use App\Models\Store;
use Livewire\Component;

class StoreComponent extends Component

{

    public $name;
    public $logo;
    public $store_id;

    protected $rules = [
        'name' => 'required',

    ];

    public function render()
    {
        return view('livewire.store-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){


        $this->validate();

        if ($this->store_id)
        {
            $store = Store::find($this->store_id);
        }else{
            $store = new Store();
        }
        $store->name = $this->name;
        $store->logo = $this->logo;

        $store->save();


    }

    function delete($store_id){
        $store = Store::find($store_id);
        if ($store) $store->delete();
    }

    function edit($store_id){
        $store = Store::find($store_id);
        if ($store){
            $this->store_id = $store->id ;
            $this->name = $store->name ;
            $this->logo = $store->logo ;

        }
    }

}
