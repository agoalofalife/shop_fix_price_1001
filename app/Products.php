<?php

namespace App;
use DB;
use App\Exceptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Validation\ValidatesRequests;
class Products extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category_Products');
    }

    public static function returnEditTable($id_catalog,$id)
    {

        switch($id_catalog)
        {
            case '2':
                $data['attributes'] = DB::table('electric__attributes')
                    ->leftJoin( 'products','id_product', '=', 'products.id')
                    ->where('id_product','=',$id)
                    ->first();
                $data['template']        = 'admin.products.edit_electric';
                $data['type_device']     = ['Бытовые','Строительные','Профессиональные','Отечественные'];

                return view('admin.products.edit',$data);

            case '6':
                $data['attributes'] = DB::table('book__attributes')
                    ->leftJoin( 'products','id_product', '=', 'products.id')
                    ->where('id_product','=',$id)
                    ->first();
                $data['template']        = 'admin.products.edit_book';
                $data['type_learning']   = ['Математика','Информатика','Английский язык','Геометрия','История'];
                $data['type_mb']         = ['Матерный',  'Немецкий',   'Французский',    'Английский','Русский'];

                return view('admin.products.edit',$data);

        }
    }
    public static function updateProductArg($id_catalog,$id,$request,$validation_attributes)
    {

        switch($id_catalog)
        {

            case '2':

                $validation_attributes->validate($request,
                    [
                        'power'                    => 'max:30',
                        'guarantee'                => 'numeric',
                        'type_device'              => 'required|max:1500'
                    ]);
                    DB::table('electric__attributes')
                        ->where('id_product', $id)
                        ->update
                          (['power'      => $request->power,
                            'guarantee'   => $request->guarantee,
                            'type'        => $request->type_device,]);
                               return true;
            case '6':

                $validation_attributes->validate($request,
                    [
                        'author'                     => 'required|max:30',
                        'pages'                      => 'numeric',
                        'type_learning'              => 'required|max:1500',
                        'type_mb'                    => 'max:1500'
                    ]);
                DB::table('book__attributes')
                    ->where('id_product', $id)
                    ->update
                    ([  'author'           => $request->author,
                        'language'         => $request->type_mb,
                        'number_pages'     => $request->pages,
                        'genre'            => $request->type_learning,]);
                return true;
        }


    }

}
