<?php

namespace App\Http\Livewire;

use App\Models\StoreExpense;
use Livewire\Component;

class StoreExpenseComponent extends Component
{

   public $store;
    public $store_id;
    public $expense_id;

    protected $rules = [
        'store_id' => 'required',
        'expense_id' => 'required',
    ];
    function mount(){
        if($this->store) $this->store_id =$this->store->id;
    }


    public function render()
    {
        return view('livewire.store-expense-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        $storeexpense = new StoreExpense();
        $storeexpense->store_id = $this->store_id;
        $storeexpense->expense_id = $this->expense_id;
        $storeexpense->save();
}


}

