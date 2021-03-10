<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResourceCollection;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "hello";
      return view('category.index');
      // return Category::all()->toJson();
     // return new CategoryResourceCollection(Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" =>"required|min:2"
        ]);

        if ($validator->fails()) {
            return ["errors" =>$validator->errors()];
        }else{
            $category = new Category();
            $category->name= $request->name;
            $category->save();
            return $category;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // $validator = Validator::make($request->all(), [
        //     "name" =>"required|min:2"
    // ]);

        // if ($validator->fails()) {
        //     return ["errors" =>$validator->errors()];
        // }else{
            $category->name= $request->name;
            $category->save();
            return $category;
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        return $category->delete();
    }
}
