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
}
