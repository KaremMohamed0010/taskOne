<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'required|image|max:2048', // Max file size: 2MB
        ]);

        $imagePath = $request->file('image')->store('user_images', 'public');

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->image_path = $imagePath;
        $user->save();

        return redirect()->back()->with('success', 'User created successfully.');
    }
}
