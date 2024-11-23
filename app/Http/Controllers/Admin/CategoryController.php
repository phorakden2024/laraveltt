<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        
        return view('admin.category.index' , ['categories' => $categories]);
    }
    public function create(){
        return view('admin.category.create');
        
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
  
        return view('admin.category.edit', ['category'=>$category]);
    }
    public function store(Request $request){
        //Step 1 validate date from use
         $validated = $request->validate([
            'name' => 'required|max:255',
         ]);
       
  
        //Step 2 write logic for save to database
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        //Redirect or respose end user
        //redirect to category page
        return redirect()->route('admin.category.index')->with('CreateSuccessfully', 'Category Create Successfully ');
    }
    public function update(Request $request,$id){
        
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index');

    }
    public function destroy(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
