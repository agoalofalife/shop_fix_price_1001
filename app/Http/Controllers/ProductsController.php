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

        $data['products'] = DB::table('products')
            ->leftJoin( 'category__products','id_catalog', '=', 'category__products.id')
            ->where([
                    ['products.count'          ,'<',$request  ->quantity],
                    ['category__products.id'   ,$sign,$request->filter_category]
                    ])
            ->select('category__products.title as title_category',
                'products.title as title_product','mark','count','products.id as id')
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
        //Извлекаем категории товаров
        $data['categories'] = DB::table('category__products')->select('title','id')->get();

        return view('admin.product_create',$data);
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
        //Излекаем номер запрошенного каталога
          $obj_catalog    = DB::table('products')->where('id','=',$id)->select('id_catalog')->first();

//        dd($number_catalog);
//        DB::table('category_products')
//            ->where('')
//            ->get();

        $slug_catalog = Category_Products::find($obj_catalog->id_catalog);

        $data['attributes'] = DB::table($slug_catalog->slug.'__attributes')
            ->leftJoin( 'products','id_product', '=', 'products.id')
            ->where('id_product','=',$id)
            ->first();
        $data['template']        = 'admin.products.edit_'.$slug_catalog->slug;
        $data['type_device']     = ['Бытовые','Строительные','Профессиональные','Отечественные'];

        return view('admin.products.edit',$data);
//        return Products::returnEditTable($number_catalog->id_catalog,$id);

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
        $this->validate($request,
        [
                'title'              => 'required|max:30',
                'mark'               => 'required|max:30',
                'description'        => 'required|max:1500',
                'recommend'          => 'required|boolean',
                'display'            => 'required|integer|boolean',

        ]);
        $product = Products::find($id);
        $product->title       = $request->title;
        $product->mark        = $request->mark;
        $product->description = $request->description;
        $product->recommend   = $request->recommend;
        $product->status      = $request->display;
        $product->save();
        if(Products::updateProductArg($product->id_catalog,$id,$request,$this)) return redirect('/admin/products');

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
