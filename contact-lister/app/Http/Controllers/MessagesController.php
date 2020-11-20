<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MessagesController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'avatar'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create New Message
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $message = new Message;
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->message = $request->input('message');
            $message->avatar = $name;
            $message->save();
        }
        // Save Message
        // Redirect
        return redirect('/')->with('success', 'Message Sent');
    }
    public function getMessages(){
        $messages = Message::all();

        return view('messages')->with('messages', $messages);
    }
    public function destroyMessage($id){
        $message = Message::find($id);
        File::delete('images/'.$message->avatar);
        $message->delete();

        return redirect('/')->with('success', 'Pesan telah dihapus');
    }
}
