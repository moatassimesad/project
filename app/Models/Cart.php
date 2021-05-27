<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = [];
    public $totalQty ;
    public $totalPrice;

    public function __Construct($cart = null) {
        if($cart) {

            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } else {

            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product,$color,$quantity) {
        $item = [
            'id' =>  $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'image' => $product->image,
            'color' => $color,
        ];

        if( !array_key_exists($product->id.$color, $this->items)) {
            $this->items[$product->id.$color] = $item ;
            $this->totalQty += 1;
            $this->totalPrice += ($product->price)*$quantity;

        } else {
            $this->items[$product->id.$color]['quantity']  += $quantity ;
            $this->totalQty +=1 ;
            $this->totalPrice += ($product->price)*$quantity;
        }



    }

    public function remove($id) {

        if( array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);

        }

    }
}
