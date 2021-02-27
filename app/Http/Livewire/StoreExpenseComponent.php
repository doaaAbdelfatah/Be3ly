<?php

namespace App\Http\Livewire;

use App\Models\StoreExpense;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoreExpenseComponent extends Component
{
    use WithFileUploads;

    public $store;
    public $store_id;
    public $branch_id;
    public $amount;
    public $expense_id;
    public $url;
    public $updated_by;
    public $comment;

    protected $rules = [
        'store_id' => 'required',
        'expense_id' => 'required',
        'amount' => 'nullable|numeric',
        'url' => 'file|max:1024', // 1MB Max
    ];
    function mount(){
        // if($this->store) $this->store_id =$this->store->id;
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
        //$fileURL = Storage::disk("public")->put( $this->url ,'store_expenses');
        // default storage public in config/filesystems.php
            $fileURL = $this->url->store('store_expenses');

            $storeexpense = new StoreExpense();
            $storeexpense->store_id = $this->store_id;
            $storeexpense->expense_id = $this->expense_id;
            $storeexpense->branch_id = $this->branch_id;
            $storeexpense->amount = $this->amount;
            $storeexpense->url =  $fileURL;
            $storeexpense->comment = $this->comment;
            $storeexpense->updated_by = auth()->user()->id;
            $storeexpense->save();
    }


}

