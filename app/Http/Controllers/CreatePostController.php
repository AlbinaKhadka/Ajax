<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;
use App\Models\Createpost;

class CreatePostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            // 'person_id' => 'required|exists:person,id', 
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = new Createpost();
       
        $post->title = $request->title;
        $post->description = $request->description;
        $post->person_id = $request->person_id;
        $post->save();
    }
    public function showForm()
{
    $persons=Person::all();
    return view('onetoone', ['persons' => $persons]);
}
public function create(){
    //   $person = Person::all();
    $person = Person::find(61);
    return view('create', ['person' => $person]);
}

}