<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::with('category', 'user')->paginate(10);
       return view('backend.pages.post.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('backend.pages.post.create', compact('categories'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $request['status'] = 'draft';
        $request['thumnbnail_path'] = 'default.png';
        $request['user_id'] = auth()->id();

        Post::create($request->all());

        $this->setSuccessMessage('Post create success');

        return redirect()->back();

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
        //
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
        //
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
