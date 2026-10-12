<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\email;


class EmailController extends Controller
{
    public function create()
    {
        return view('email');
    }
    
public function sendEmail(Request $request)
    {
        $stock_out =  DB::SELECT('SELECT designation FROM stock_curs WHERE qtMin>=qt');
  if(  $stock_out =  DB::SELECT('SELECT designation FROM stock_curs WHERE qtMin>=qt')){

       

        $data = [
          'subject' => 'GSTOCK',
          'email' => 'mabyba9@gmail.com',
          'content'  =>'les produits en ruptire de stock sont les suivants '
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
          $stock_out =  'mmmmmmmmmm';
          $message->to($data['email'])
          ->subject($data['subject'])
          ->text($stock_out);

        });
       // dd($message);

    }
    }
}