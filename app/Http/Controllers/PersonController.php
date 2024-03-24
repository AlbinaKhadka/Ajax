<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;
use App\Models\profiles;

use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    public function store(Request $request)
    {
        $person= person::create([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        
        ]);
      $person->profile()->create([
            'contact'=>$request->contact,
            'address'=>$request->address,
        ]);
       
        return response()->json(['message'=>'user created successfully','data'=>$person->load('profile')]);
    }
    public function latestPerson()
    {
        $person = Person::with('profile')->latest()->first();

        if ($person) {
            return response()->json([
                'success' => true,
                'data' => $person,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No person found',
            ], 404);
    }
}

public function showPersons()
    {
        $persons = Person::with('profile')->get(); 
        return view('onetoone', compact('persons')); 
    }
}
