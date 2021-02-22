<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class NewBranchComponent extends Component
{
    use WithPagination;

    public $name ;
    public $address ;
    public $phone ;
    public $mobile ;
    public $type ;
    public $store_id ;
    public $branch_id;

    protected $rules = [
        'name' => 'required|min:2',
        'phone' => 'nullable|min:9',
        'address' => 'nullable',
        'mobile' => 'nullable|min:10',
        'type' => 'required',
        'store_id' => 'required',
    ];

    public function render()
    {
        $data =Branch::paginate(6);
        return view('livewire.new-branch-component' ,["data"=>$data]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        if($this->branch_id)
            $branch = Branch::find($this->branch_id);
        else {
            $branch = new Branch();
        }
        $branch->name = $this->name;
        $branch->phone = $this->phone;
        $branch->address = $this->address;
        $branch->mobile = $this->mobile;
        $branch->type = $this->type;
        $branch->store_id = $this->store_id;
        $branch->save();
    }

    function delete($branch_id){
        Branch::destroy($branch_id);
    }

    function edit($branch_id){
        $branch =Branch::find($branch_id);
        $this->branch_id = $branch->id;
        $this->name = $branch->name;
        $this->phone = $branch->phone;
        $this->address = $branch->address;
        $this->mobile = $branch->mobile;
        $this->type = $branch->type;
        $this->store_id = $branch->store_id;
    }
}
