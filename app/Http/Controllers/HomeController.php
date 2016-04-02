<?php

namespace App\Http\Controllers;

use App\Category_Products;
use App\Products;
use Cart;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories                      = Category_Products::all()->where('status','1');
        $data['categories']              = $categories;
        $data['recommend_list_products'] = Products::where('recommend','=','1')
                                           ->where('count','>','0')
                                           ->where('status','=','1')
                                           ->paginate(3);


        return view('welcome',$data);
    }
}
