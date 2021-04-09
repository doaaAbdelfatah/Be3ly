<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use Livewire\Component;

class AddUnitComponent extends Component
{

    public $name;
    public $unit_id;

    protected $rules = [
        'name' => 'required',

    ];

    public function render()
    {
        return view('livewire.add-unit-component');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();


        if ($this->unit_id){
            $unit = Unit::find($this->unit_id);
        }

        else {
            $unit = new Unit();
        }

        $unit->name = $this->name;

        $unit->save();
        $this->clear();
    }
    function delete($unit_id)
    {
        Unit::destroy($unit_id);
    }

    function edit($unit_id)
    {
        $unit = Unit::find($unit_id);
        $this->unit_id = $unit->id;
        $this->name = $unit->name;
    }
    function clear()
    {
        $this->unit_id = null;
        $this->name = null;
    }
}
