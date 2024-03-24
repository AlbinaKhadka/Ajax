<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;
use App\Models\Post;
use App\Models\lists;

use Illuminate\Support\Facades\Log;


class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'person_id' => 'required|exists:person,id', 
        ]);
       

        $latestPerson = person::latest()->first();
        if (!$latestPerson) {
            return response()->json(['message' => 'No users found.'], 404);
        }
        
        $post = new Post([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'person_id' => $latestPerson->id, 
        ]);
    
    $post->save();

    
        return response()->json(['message' => 'Post added successfully!', 'post' => $post], 201);
    }
    public function getPostsForLatestPerson()
    {
        $latestPerson = person::latest()->first();
        if (!$latestPerson) {
            return response()->json(['message' => 'No persons found.'], 404);
        }
      
        $post = Post::where('person_id', $latestPerson->id)->get();
    
       
     
        

        return response()->json(['message' => 'Posts retrieved successfully!', 'posts' => $posts], 200);
  
}
public function showPostsForLatestPerson()
    {
        // $latestPerson = person::latest()->first();
        // if (!$latestPerson) {
        //     return redirect()->back()->with('error', 'No person found');
        // }
        $latestPersonId = \App\Models\Person::latest()->first()->id;
    $posts = \App\Models\Post::where('person_id', $latestPersonId)->get();

    return view('list', compact('posts'));

        // $post =  Post::where('person_id', $latestPerson->id)->get();
        // return view('posts.index', compact('posts'));
    }

  
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->update($request->all());
        return response()->json(['message' => 'Post updated successfully', 'post' => $post]);
    }

    
    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
    public function index()
    {
        $posts = Post::all(); 
        return view('list', compact('posts')); 
    }
    
    public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('update', compact('post'));
}

public function indexs()
{
    $posts = Post::orderBy('updated_at', 'desc')->get(); 
    return view('list', compact('posts'));
}


public function create(Request $request, $person_id = null)
{
    $person = null;
    if ($person_id) {
        $person = Person::findOrFail($person_id);
    }
    
    return view('onetoone', compact('person')); 
}
    
}





