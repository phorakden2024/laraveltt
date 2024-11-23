<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request){
     
        $post = Post::when($request->category_id, function ($query, $category_id) {
                    $query->where('category_id', $category_id);
                })
                // relarionship many to many
                ->when($request->search, function ($query, $search) {
                    $query->where('title', 'LIKE' , '%' .$search. '%' );
                 })
                // relarionship many to many
                ->when($request->tag_id, function ($query, $tag_id) {
                    $query->whereHas('tags',function($sub_query) use ($tag_id){
                    $sub_query->where('id', $tag_id);
                    });
                })->paginate(8)
                //search append with query string
                ->withQueryString();
        
        return view('index',['posts'=>$post]);
    }
    public function article(Request $request,$id){
        $post = Post::FindOrFail($id);
        return view('article',['post'=>$post]);
    }

}
