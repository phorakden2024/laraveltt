<?php

namespace App\Http\Controllers\Admin;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;
class TagController extends Controller
{
    public function index(){
        $tags = tag::all();
        
        return view('admin.tag.index' , ['tags' => $tags]);
    }
    public function create(){
        return view('admin.tag.create');
    }
    public function edit($id)
    {
        $tag = tag::findOrFail($id);
  
        return view('admin.tag.edit', ['tag'=>$tag]);
    }
    public function store(Request $request){
        //Step 1 validate date from use
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        //Step 2 write logic for save to database
        $category = new tag();
        $category->name = $request->name;
        $category->save();

         //Redirect or respose end user
         //redirect to tag page
         return redirect()->route('admin.tag.index')->with('CreateSuccessfully', 'Tag Create Successfully ');
    }
    public function update(Request $request,$id){
    
        $tag = tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('admin.tag.index');

    }
    public function destroy(Request $request, $id){
        $tag = tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
