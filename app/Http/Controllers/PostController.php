<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::paginate(10);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tags::all();
        $category = Category::all();
        return view('admin.post.create', compact('category', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'

        ]);

        $gambar = $request->gambar;
        $new_gambar = time() . $gambar->getClientOriginalName();

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uploads/post/' . $new_gambar,
            'slug' => Str::slug($request->judul)


        ]);

        $post->tags()->attach($request->tags);

        $gambar->move('public/uploads/post/', $new_gambar);
        return redirect()->route('post.index')->with('success', 'Postingan anda berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $tag = Tags::all();
        $post = Posts::findorfail($id);
        return view('admin.post.edit', compact('post', 'tag', 'category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required'

        ]);
        $post = Posts::findorfail($id);

        $post_data = [
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'slug' => Str::slug($request->judul)
        ];

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('public/uploads/post/', $new_gambar);
            $post_data = [
                'gambar' => 'public/uploads/post/' . $new_gambar
            ];
        }
        $post->tags()->sync($request->tags);
        $post->update($post_data);


        return redirect()->route('post.index')->with('success', 'Postingan anda berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
