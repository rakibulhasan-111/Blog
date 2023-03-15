<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        // show all blog posts
        $posts = BlogPost::all();
        return view('posts',['posts'=>$posts]);
    }

    public function create()
    {
        //show form to create a blog post
        return view('create');
    }

   
    public function store(Request $request)
    {
        //store a new post
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => 1
        ]);

        return redirect('/blog');
    }

    public function show(BlogPost $blogPost)
    {
        //show a blog post
        return view('show',['posts'=>$blogPost]);
    }

    
    public function edit(BlogPost $blogPost)
    {
        //show form to edit the post
        return view('edit',['posts' => $blogPost]);
    }

    
    public function update(Request $request, BlogPost $blogPost)
    {
        //save the edited post
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('/blog');
    }

    
    public function destroy(BlogPost $blogPost)
    {
        //delete a post
        $blogPost->delete();

        return redirect('/blog');
    }

}
