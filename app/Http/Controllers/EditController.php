<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lists;

class EditController extends Controller
{
   
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $post = Post::findOrFail($id);
    $post->update($request->only(['title', 'description']));


    return redirect()->route('posts.list')->with('success', 'Post updated successfully');
}

}
