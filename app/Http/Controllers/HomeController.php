<?php

namespace App\Http\Controllers;

use App\Category_Products;
use App\Drinks;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories          = Category_Products::all()->where('status','1');
        $data['categories']  = $categories;
        return view('welcome',$data);
    }
}
