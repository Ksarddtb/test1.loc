<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\ProductNotif;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('products');
    }
    public function notif()
    {
        $User=User::first();
        $NotifDate=[
            'body'=>'test message',
            'notifText'=>'Test text',
            'url'=>url('/'),
            'thankyou'=>'спасибо',
        ];
        // $notif=new ProductNotif($NotifDate));
    }
}
