<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $sub_id;
    public $name ;
    public $for;
    public $category_id;

    protected $rules = [
        'name' => 'required',
        'category_id' => 'nullable',
    ];


    public function render()
    {
        return view('livewire.category-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

$this->validate();
if($this->sub_id){
    $category= Category::find($this->sub_id);
}
else{
$category = new category();
}
$category->name=$this->name;
$category->category_id = $this->category_id;
$category->save();
}


function delete($sub_id){
    Category::destroy($sub_id);
}

function edit($sub_id){
    $category =Category::find($sub_id);
    $this->for=$category->id;
    $this->category_id = $category->category_id;
    $this->name = $category->name;
 }


}
