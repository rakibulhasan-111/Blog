<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Http\Request;


/*$user = BlogPost::find(1);

$tokenResult = $user->createToken('APP_NAME');

$token = $tokenResult->accessToken;*/


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
        
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'image'=>$request->image,
        
            'user_id' => 1
        ]);

        return redirect('blog/' . $newPost->id);
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

    //postman

    public function apiindex()
    {
        // show api
        $post = BlogPost::all();
        return response()->json($post);
    }

    public function apistore(Request $request)
    {
        $existingPost = BlogPost::where('title', $request->title)
            ->where('user_id', $request->user_id)
            ->first();
    
        if ($existingPost) {
            return response()->json([
                'message' => 'Post already exists',
                'data' => $existingPost
            ], 409);  
        }

        $post = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image,
        
            'user_id' => 1
        ]);
    
        return response()->json([
            'message' => 'Post created successfully',
            'data' => $post
        ]);
    }

    public function apishow($id)
    {
        //show a blog post
        $post = BlogPost::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ], 404);
        }

        return response()->json([
            'data' => $post
        ]);
    }
    
    public function apiupdate(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $post->update($request->all());

        return response()->json($post, 200);
    }

    
    public function apidestroy($id)
    {
        $post = BlogPost::find($id);
    
        if (!$post) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        $post->delete();
    
        return response()->json(['message' => 'Post deleted successfully'], 200);

    }


}
