<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class MailController extends Controller 
{ 
    


       public function basic_email() {
          $data = ['name'=>"Virat Gandhi"];
       
          Mail::send('mail', $data, function($message) {
             $message->to('tchamouramses@gmail.com', 'Tutorials Point')->subject
                ('Laravel Basic Testing Mail');
             $message->from('simulateurramses75@gmail.com','Virat Gandhi');
          });
          echo "Basic Email Sent. Check your inbox.";
       }

    //    public function html_email() {
    //       $data = array('name'=>"Virat Gandhi");
    //       Mail::send('emails/invite', $data, function($message) {
    //          $message->to('foguexavier@gmail.com', 'Tutorials Point')->subject
    //             ('Laravel HTML Testing Mail');
    //          $message->from('safrancois68@gmail.com','Virat Gandhi');
    //       });
    //       echo "HTML Email Sent. Check your inbox.";
    //    }


    //    public function attachment_email() {
    //       $data = array('name'=>"Virat Gandhi");
    //       Mail::send('mail', $data, function($message) {
    //          $message->to('foguexavier@gmail.com', 'Tutorials Point')->subject
    //             ('Laravel Testing Mail with Attachment');
    //          $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
    //          $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
    //          $message->from('safrancois68@gmail.com','Virat Gandhi');
    //       });
    //       echo "Email Sent with attachment. Check your inbox.";
    //    }
}