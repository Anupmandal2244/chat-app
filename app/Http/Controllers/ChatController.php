<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Chat;

class ChatController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }

    public function chat(Request $request){
        $request->validate([
            'email' => 'required|string',
            // 'message' => 'required|string',
        ]);
        $username = $request->email;
        return view ('chat',compact('username'));
    }
    public function broadCastChat(Request $request){
        $request->validate([
            'email' => 'required|string',
            'message' => 'required|string',
        ]);
        $username = $request->email;
        $message = $request->message;
        event(new chat($username,$message));
        return response()->json($request->all());
    }

    public function notfoundChat(){
        return redirect()->route('user.login');
    }
}
