<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Copy_Message;
use Illuminate\Http\Request;
use App\Models\Message_Attach;
use App\Http\Requests\MessageRequest;

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


    public function store(MessageRequest $request)
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

        return redirect(Route('message.create'))->with('success','Message Is Sending');


    }


    public function show($id)
    {
        $message=Message::find($id);
        // $user=$message->user->name;
        // dd($user);
        // $file=$message->message_attach;
        // dd($file);
        return view('admin.message.show',compact('message'));
    }



    public function destroy($id)
    {
        //
    }

    public function inbox($id){


        $user=User::find($id);
       $mentions=$user->copy_message;





    //    dd($mentions);
       return view('admin.message.inbox',compact('mentions'));
}


    public function sent($id){
            $user=User::find($id);
            $messages=$user->message;
            return view('admin.message.sent',compact('messages'));
    }
}
