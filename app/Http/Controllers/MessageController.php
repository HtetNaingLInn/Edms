<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Copy_Message;
use Illuminate\Http\Request;
use App\Models\Message_Attach;

class MessageController extends Controller
{

    public function index()
    {
        $messages=Message::all();
        return view('admin.message.index',compact('messages'));

    }


    public function create()
    {
        $users=User::all();
        return view('admin.message.create',compact('users'));
    }


    public function store(Request $request)
    {
        $message=Message::create([
            'message_no'=>$request->message_no,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id
        ]);

        $users=$request->users;
        $message_id=$message->id;

        foreach($users as $user){
            Copy_Message::create([
                'message_id'=>$message_id,
                'user_id'=>$user
            ]);
        }

        $files=$request->file;

        foreach($files as $file){
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/attach/',$fileName);
            Message_Attach::create([
                'message_id'=>$message_id,
                'file'=>$fileName
            ]);
        }

        return redirect(Route('message.create'))->with('success','Created Successful');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
