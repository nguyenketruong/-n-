<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;
class LienheController extends Controller
{
     public function getLienhe()
    {
        return view('computer.layout.home.lienhe');
    }
    public function postLienhe(Request $request)
    {
       $input = $request->all();
        Mail::send('computer.layout.email.email', array('name'=>$input['name'],'content'=>$input['content']), function($message){
	        $message->to('nguyenketruong.dhv@gmail.com', 'Visitor')->subject('Visitor Feedback!');
	    });
        Session::flash('flash_message', 'Send message successfully!');
    }
}
