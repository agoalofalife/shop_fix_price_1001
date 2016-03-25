<?php

namespace App\Http\Controllers;
use DB;
use  Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Category_Products;
use App\Http\Requests;
use \App\Products;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $data['products'] = DB::table('products')
             ->leftJoin( 'category__products','id_catalog', '=', 'category__products.id')
             ->select('category__products.title as title_category',
                'products.title as title_product','mark','count','products.id as id')
             ->paginate(40);

        $data['category'] = Category_Products::all('title');
        $data['counter']  = 1;

        return view('admin.products.index',$data);
    }


    public function filter(Request $request)
    {
        if($request->filter_category=='10000000000') $sign = '<';else $sign = '=';
        //Простити меня за этот кастыль

        $data['category'] = Category_Products::all('title','id');
//        dd($request);
        $data['products'] = DB::table('products')
            ->leftJoin( 'category__products','id_catalog', '=', 'category__products.id')
            ->where([
                    ['products.count'          ,'<',$request->quantity],
                    ['category__products.id'   ,$sign,$request->filter_category]
                    ])
            ->select('category__products.title as title_category',
                'products.title as title_product','mark','count')
            ->paginate(40);

        $data['counter']  = 1;

        return view('admin.products.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date['product'] = Products::find($id);
        return view('admin.products.edit',$date);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
