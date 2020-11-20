<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update(Request $request)
    {
        $id=Auth::id();
        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        File::delete(public_path() . '/profile_picture/'.$user->photo);
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $file->move(public_path() . '\profile_picture', $filename);
            $user->photo=$filename;
        }
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->save();
        return view('about')->with('user', $user);
    }
    public function edit(Request $request)
    {
        return view('auth.edit', [
            'user' => $request->user()
        ]);
    }
}
