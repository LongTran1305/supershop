<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestTransaction;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Support\Carbon;

class ShoppingCartController extends Controller
{
    public function addProduct(Request $request, $id){
        $product = Product::select('pro_name','id','pro_price','pro_sale','pro_avatar')->find($id);

        if(!$product){
            return redirect('/');
        };

        $price = $product->pro_price;

        if($product->pro_sale){
            $price = $price * (100-$product->pro_sale)/100;
        }

        \Cart::add([
            'id'=>$id,
            'name'=>$product->pro_name,
            'qty'=>1,
            'price'=>$price,
            'options' =>[
                'avatar' => $product->pro_avatar,
                'sale' => $product->pro_sale,
                'price_old' => $product->pro_price
            ],
        ]);

        return redirect()->back();
    }

    public function deleteProductItem($key){
        \Cart::remove($key);

        return redirect()->back();
    }

    public function getListShoppingCart(){
        $products = \Cart::content();
        return view('shopping.index',compact('products'));
    }

    //Check out form
    public function getFormPay(){
        $products = \Cart::content();

        return view('shopping.pay',compact('products'));
    }

    //Save order info
    public function saveInfoShoppingCart(RequestTransaction $requestTransaction){
        $totalMoney = str_replace('.','',\Cart::subtotal());
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total' => (int)$totalMoney,
            'tr_address' => $requestTransaction->tr_address,
            'tr_phone' => $requestTransaction->tr_phone,
            'tr_note' => $requestTransaction->tr_note,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if($transactionId){
            $products = \Cart::content();
            foreach ($products as $product) {
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id' => $product->id,
                    'or_qty' => $product->qty,
                    'or_price' => $product->price, //$product->options->old_price,
                    'or_sale' => $product->options->sale
                ]);
            }
        }
        \Cart::destroy();

        return redirect('/');
    }

}
