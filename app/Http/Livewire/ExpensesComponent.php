<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Expense;
use Livewire\Component;

class ExpensesComponent extends Component
{
     public $name;
     public $expense_id;

     protected $rules = [
        'name' => 'required',

    ];

    public function render()
    {
        return view('livewire.expenses-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();
        if($this->expense_id){
            $expense = Expense::find($this->expense_id);
        }else{
            $expense = new Expense();
        }

        $expense->name = $this->name;

        $expense->save();
        $this->clear();


    }
    function delete($expense_id){
        Expense::destroy($expense_id);
    }

    function edit($expense_id){
        $expense =Expense::find($expense_id);
        $this->expense_id = $expense->id;
        $this->name = $expense->name;

    }
    function clear(){
        $this->expense_id = null;
        $this->name = null;
    }
}
