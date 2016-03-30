<?php

namespace App\Http\Controllers;

use App\Category_Attributes;
use DB;
use  Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Category_Products;
use App\Http\Requests;
use \App\Products;
use \App\Parameters;
use Input;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\StoreProductRequest;
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
        //Простити меня за этот костыль

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * choice category for create product(sorry without js)
     */
    public function choice()
    {
        $data['categories'] = Category_Products::all('title','id');
        $data['counter']  = 1;
        return view('admin.products.choise_category',$data);
    }
    /**
     * Show the form for creating a new resource.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        //Выборка категории товаров
        $data['categories']  =  DB::table('category__products')
                               ->select  ('title','id')
                               ->get();
        //Выборка параметров категории
        $data['parameters']  =  DB::table('category__attributes')
                               ->where   ('id_category','=',$id)
                               ->select  ('parameter','type','default')
                               ->get();
        $data['category']    = $id;
        return view('admin.product_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreProductRequest $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreProductRequest $request,$id)
    {
//        Валидация изображений
    for($i=0;$i<count($request->photo);$i++)
    {
    $this->validate($request,[
    'photo.'.$i => 'mimes:jpeg,bmp,png|max:1000',
    ]);
    }

        $image         = Input::file('photo');
        $set_link_img  = new Products();
        for($i=0;$i<count($image);$i++)
        {
            //Переименовываем файл
            //$id.'_'.$i. '.' . $image[$i]->getClientOriginalExtension() старое название картинки
            //Переименовываем файл
            $filename  = $image[$i]->getClientOriginalName();

            //Путь картинки
            $path = public_path('images/product/' . $filename);

            $path_in_table_product[] = '/images/product/' . $filename;
            Image::make($image[$i]->getRealPath())->resize(200, 200)->save($path);
        }

        $product = new Products();
        $product->id_catalog  = $id;
        $product->title       =  $request->title;
        $product->mark        = $request->mark;
        $product->count       = $request->count;
        $product->description = $request->description;
        $product->status      = $request->status;
        $product->recommend   = $request->recommend;
        $product->link_img    = serialize($path_in_table_product);
        $product->save();
        $insertGetId_product = $product->id;

        $array_request       = Input::all();
//Вырезаем только параметры валидации
        $slice_parameters    = array_slice($array_request,7,-1);
//dd($slice_parameters);
// Массив дополнительных параметроов
            foreach($slice_parameters as $key=>$set_user)
            {
//Если несолько слов
                $key       = str_replace('_',' ',$key);
                //Узнаем тип поля из бд
                $type_form = DB::table('category__attributes')
                     ->where('parameter','=',$key)
                     ->select('type','id')
                     ->first();

//Небольшая валидация при создание товара
                switch($type_form->type){
                    case 'text':
                        $this->validate($request,
                            [
                        $key => '',
                            ]);
                        break;
                    case 'texterea':
                        $this->validate($request,
                            [
                        $key => 'max:100',
                            ]);
                        break;
                    case 'select':
                            $this->validate($request,
                                [
                            $key[0] => 'max:100',
                                ]);
                    $set_user  = $set_user[0];

                        break;
                    case 'number':
                        $this->validate($request,
                            [
                                $key => 'numeric',
                            ]);
                        break;

                }
                //Вставляем отвалидированный параметр
                $new_parameter = new Parameters();
                $new_parameter->id_category = $id;
                $new_parameter->id_product  = $insertGetId_product;
                $new_parameter->id_parameter= $type_form->id;
                $new_parameter->data        = $set_user;
                $new_parameter->save();
            }

        $data['products'] = DB::table('products')
            ->leftJoin( 'category__products','id_catalog', '=', 'category__products.id')
            ->select('category__products.title as title_category',
                'products.title as title_product','mark','count','products.id as id')
            ->paginate(40);

         return   $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "я тебя ждал!";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //Массив дополнительных параметров по id  продукта
        $data_in_Parameters = Parameters::where('id_product','=',$id)->get();

        for($i=0;$i<count($data_in_Parameters);$i++)
        {
            $id_parameter = $data_in_Parameters[$i]->id_parameter;
            $data['parameters'][$data_in_Parameters[$i]->data] = Category_Attributes::where('id','=',$id_parameter)->first();
        }
        //Выборка категории товаров
        $data['categories']  =  DB::table('category__products')
            ->select  ('title','id')
            ->get();


         $data['attributes'] =  Products::find($id);
         $data['img_link']   = unserialize($data['attributes']->link_img);

         return view('admin.products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {

/*-------------------------------------------------
 *      Валидация картинок
 * ------------------------------------------------
 */
        for($i=0;$i<count($request->photo);$i++)
        {
            $this->validate($request,[
                'photo.'.$i => 'mimes:jpeg,bmp,png|max:1000',
            ]);
        }
/*-------------------------------------------------
 *     Добавление каритнок в массив из бд
 * ------------------------------------------------
 */
         $image            = Input::file('photo');

        if(!empty($image[0])){
            for($i=0;$i<count($image);$i++)
            {
//$id.'_'.$i. '.' . $image[$i]->getClientOriginalExtension() старое название картинки
                //Переименовываем файл
                $filename                 = $image[$i]->getClientOriginalName();
                //Путь картинки
                $path = public_path('images/product/' . $filename);
                //Массив новых картинок
                $path_in_table_product[]  = '/images/product/' . $filename;
                Image::make($image[$i]->getRealPath())->resize(200, 200)->save($path);
                $array_images             = Products::find($id);
                $array_images             = unserialize($array_images->link_img);
                //Добавляем новую картинку в массив
                if(!empty($array_images) )
                {
                    foreach($path_in_table_product as $download_image)
                    {
                        if(in_array($download_image,$array_images))continue;
                        else $array_images[] = $download_image;
                    }
                }
                else  $array_images = $path_in_table_product;
            }
        }

        $product              = Products::find($id);
        $product->title       = $request->title;
        $product->mark        = $request->mark;
        $product->description = $request->description;
        $product->recommend   = $request->recommend;
        $product->count       = $request->count;
        $product->status      = $request->status;
        if($image[0])
        {
            $product->link_img    = serialize($array_images);
        }

        $product->save();
        $array_request        = Input::all();
//Вырезаем только параметры валидации
        $slice_parameters     = array_slice($array_request,8,-1);

        foreach($slice_parameters as $key=>$set_user)
        {
//Если несолько слов
            $key       = str_replace('_',' ',$key);
            //Узнаем тип поля из бд
            $type_form = DB::table('category__attributes')
                ->where('parameter','=',$key)
                ->select('type','id')
                ->first();

//Небольшая валидация при создание товара
            switch($type_form->type){
                case 'text':
                    $this->validate($request,
                        [
                            $key => '',
                        ]);
                    break;
                case 'texterea':
                    $this->validate($request,
                        [
                            $key => 'max:100',
                        ]);
                    break;
                case 'select':
                    $this->validate($request,
                        [
                            $key[0] => 'max:100',
                        ]);
                    $set_user  = $set_user[0];

                    break;
                case 'number':
                    $this->validate($request,
                        [
                            $key => 'numeric',
                        ]);
                    break;

            }
            $update_parameter       = Parameters::where('id_product','=',$id)
                                    ->where('id_parameter', '=' ,$type_form->id)
                                    ->select('id')->get();

            $new_parameter          = Parameters::find($update_parameter[0]->id);

            $new_parameter->data    = $set_user;
            $new_parameter->save();

        }
        return   $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('/admin/products');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy_image(Request $request,$id)
    {
        $array_images  = Products::find($id);
        $array_images  = unserialize($array_images->link_img);

        foreach($array_images as $key=>$link)
        {
            if($link==$request->delete){
                unset($array_images[$key]);
            }
        }
        $new_images              = Products::find($id);
        $new_images->link_img    = serialize($array_images);
        $new_images->save();
        return redirect()->back();
    }
}
