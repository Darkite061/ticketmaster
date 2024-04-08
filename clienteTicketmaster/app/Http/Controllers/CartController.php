<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function hacerPedido(){
        $cartItems = \Cart::getContent();

        //Insertamos en la tabla orders y obtenemos el id
        $purchase_id=DB::table('purchases')->insertGetId([
            'user_id' => 2,
            'date' => now(),
            'total_amount' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $total=0;

        foreach($cartItems as $evento){
            $sub_total=$evento['quantity']*$evento['price'];
            $id=DB::table('purchases_detaile')->insertGetId([
                'purchase_id' => $purchase_id,
                'event_id' => $evento['id'],
                'quantity' => $evento['quantity'],
                'price' => $evento['price'],
                'sub_total' => $sub_total,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $total+=$sub_total;
            // $eve=DB::table('events')->where('id',$evento['id'])->first();
            // DB::table('events')->where('id',$evento['id'])
            // ->update([
            //     'quantity' => $eve->quantity-$evento['quantity'],
            //     'updated_at' => now(),
            // ]);
        }

        DB::table('purchases')->where('id',$purchase_id)
        ->update([
            'total_amount' => $purchase_id,
            'updated_at' => now(),
        ]);

        \Cart::clear();

        session()->flash('success', 'Pedido Realizado !');

        return redirect()->route('cart.list');
    }
}
