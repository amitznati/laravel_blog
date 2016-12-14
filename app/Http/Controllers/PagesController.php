<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller{
    
    public function getIndex(){
        $posts = Post::orderBy('id','desc')->take(4)->get();
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
    
    
    
}