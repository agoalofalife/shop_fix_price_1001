<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Category_Products;
use Cart;
use Illuminate\Support\Facades\Auth;
use \PHPMailer;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories']            = Category_Products::all();
        $data['counter']               = 1;
        $data['array_cart_for_pay']    = Cart::getContent()->toArray();
        return view('cart.index',$data);
    }

    public function add($id)
    {
        $info_product = Products::find($id);
        Cart::add($id,$info_product->title,1001,1, array());
        Session::put('count', Cart::getTotalQuantity());
        return redirect()->back();
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
        //
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
        Cart::remove($id);
        Session::put('count', Cart::getTotalQuantity());
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function correct($id)
    {
        switch($_GET['action'])
        {
            case('plus'):
                Cart::update($id, array(
                    'quantity' => 1,
                ));
                break;
            case('minus'):
                Cart::update($id, array(
                    'quantity' => -1,
                ));
                break;
            default:return redirect()->back();

        }

        Session::put('count', Cart::getTotalQuantity());
        return redirect()->back();
    }

    public function createOrder()
    {
        $orderArray = Cart::getContent()->toArray();
        $output = 'Ваш заказ<br>';
        foreach($orderArray as $goods)
        {
            $output.= $goods['name']." ".$goods['quantity']." шт.<br>";
        }

        $output.="Общая сумма заказа ".Session::get('count')*1001;
        $output.=" рубль";
        $output.= "<br>E-mail отправителя: Магазин все по 1001 руб.";
        $output.= "<br>Email клиента ".Auth::user()->email;

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host       = "smtp.yandex.ru";
        $mail->Username   = "pupkinva.pupkin2017@yandex.ru";
        $mail->Password   ='3128060';
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('pupkinva.pupkin2017@yandex.ru', 'Магазин все по 1001');
        $mail->addAddress(Auth::user()->email, 'Получатель');     // Add a recipient
        $mail->addCC('pupkinva.pupkin2017@yandex.ru','123','321321');
        $mail->addReplyTo('pupkinva.pupkin2017@yandex.ru', 'Robot');
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Оформлен заказ в магазине все по 1001 рубль';
        $mail->Body    = $output;
        $mail->AltBody = $output;

        if($mail->Send())
        {
            foreach($orderArray as $goods)
            {
                $new_number = Products::find($goods['id'])->count-$goods['quantity'];
                Products::where('id',$goods['id'])
                    ->update(['count' => $new_number]);
            };
            Cart::clear();
            Session::forget('count');
            return redirect('/')->with('info', 'Вы успешно оформили заказ');
        }




    }
}
