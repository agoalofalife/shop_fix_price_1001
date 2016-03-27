<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use  Illuminate\Pagination\Paginator;
use App\Http\Requests;
use App\Products;
use App\Category_Products;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $categories          = Category_Products::all();
        $data['categories']  = $categories;
        $data['counter']     = 1;
        return view('admin.category',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,
            [
                'newCategory' => 'required|max:30',
                'display'     => 'required|integer|boolean'
            ]);
//        dd($request);
       for($i=0;$i<count($request->name_text);$i++){
           $arrayParametrs[$i][] = $request->name_text[$i] ;
           $arrayParametrs[$i][] = $request->type_form[$i] ;
           $arrayParametrs[$i][] = $request->slug[$i] ;
       }
        dd($arrayParametrs);
//foreach($request->name_text as $name){
//    $arrayParametrs[] = $name;
//    $arrayParametrs[] = $request->type_form;
//}
dd($request);
       dd(unserialize(serialize($request->type_form)));

        $new_category           = new Category_Products();
        $new_category->title    = $request->newCategory;
        $new_category->status   = $request->display;
        $new_category->save();
        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories          = Category_Products::all()->where('status','1');
        $data['categories']  = $categories;
        $data['products']    = Products::where('status','1')->where('id_catalog',$id)->paginate(6);
        return view('category.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category_Products::find($id);
        return view('admin.category_edit',$data);
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
                'title'       => 'required|max:30',
                'display'     => 'required|integer|boolean'

            ]);

        $category         = Category_Products::find($id);
        $category->title  = $request->title;
        $category->status = $request->display;
        $category->save();
        return redirect('/admin/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category_Products::destroy($id);
        return redirect('/admin/category');

    }
}
