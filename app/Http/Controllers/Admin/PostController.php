<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\category;
use App\Models\tag;
use App\Models\Post;
use Symfony\Component\Translation\CatalogueMetadataAwareInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = post::paginate(10);
        return view('admin.post.index', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'thumbnail' => 'required|mimes: jgp,jpeg,png|max:2048',
                'category_id' => 'required|exists:categories,id',
            ]);
            $filename = time() . '_' . $request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs(
                'uploads',
                $filename,
                'public'
            );
            $post = new Post();
            $post->user_id = Auth()->id();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->thumbnail = $filePath;
            $post->category_id = $request->category_id;
            $post->save();
            $post->tags()->sync($request->tags);

            DB::commit();
            return redirect()->route('admin.post.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'thumbnail' => 'nullable|mimes: jgp,jpeg,pgn|max:2048',
                'category_id' => 'required|exists:categories,id',
            ]);

            $post = post::findOrFail($id);
            $post->user_id = Auth()->id();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;
            if ($request->hasfile('thumbnail')) {

                $filename = time() . '_' . $request->thumbnail->getClientOriginalName();
                $filePath = $request->file('thumbnail')->storeAs(
                    'uploads',
                    $filename,
                    'public'
                );
                $post->thumbnail = $filePath;
            }
            $post->save();

            $post->tags()->sync($request->tags);
            DB::commit();

            return redirect()->route('admin.post.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
