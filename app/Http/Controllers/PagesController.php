<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Session;

class PagesController extends Controller{
    
    public function getIndex(){
        $posts = Post::orderBy('id','desc')->paginate(4);
        return view('pages.welcome')->withPosts($posts);
    }
    
    public function getAbout(){
        $first = 'Amit';
        $last = 'Znati';
        $fullname = $first . " " . $last;
        $email = 'amitznati@gmail.com';
        $data = [];
        $data['fullname'] = $fullname;
        $data['email'] = $email;
        return view('pages.about')->withData($data);
    }
    
    public function getContact(){
        return view("pages.contact");
    }

    public function postContact(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'email'   => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
            ]);

        $data = array(
            'email'       => $request->email, 
            'subject'     => $request->subject,
            'bodyMessage' => $request->message
            );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('amitznati@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your massege successfuly sent.');

        return redirect('/');
    }
    
    
    
}