<?php

namespace App\Http\Controllers;

use App\Models\Message;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        return view('contact');
    }
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
            $message->user_id = Auth::id();
            $message->save();
        }
        // Save Message
        // Redirect
        return redirect('/')->with('success', 'Message Sent');
    }
    public function getMessages(){
        $messages = Message::with(['users'])->where('user_id',Auth::id())->get();

        return view('messages')->with('messages', $messages);
    }
    public function destroyMessage($id){
        $message = Message::find($id);
        File::delete('images/'.$message->avatar);
        $message->delete();

        return redirect('/')->with('success', 'Pesan telah dihapus');
    }
    public function export()
    {
        set_time_limit(300);
        // Fetch all customers from database
        $data = Message::with(['users'])->where('user_id',Auth::id())->get();
        $pdf = PDF::loadView('pdf.messages', ['data'=>$data]);
        $pdf->setOption('enable-local-file-access', true);
        $pdf->save(storage_path().time().'.pdf');
        return $pdf->stream(time().'.pdf');
    }
}
