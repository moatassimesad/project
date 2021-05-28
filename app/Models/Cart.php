<?php

namespace App\Models;


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
            $this->totalQty += $quantity;
            $this->totalPrice += ($product->price)*$quantity;

        } else {
            $this->items[$product->id.$color]['quantity']  += $quantity ;
            $this->totalQty +=$quantity ;
            $this->totalPrice += ($product->price)*$quantity;
        }



    }

    public function remove($id,$color) {

        if( array_key_exists($id.$color, $this->items)) {
            $this->totalQty -= $this->items[$id.$color]['quantity'];
            $this->totalPrice -= $this->items[$id.$color]['quantity'] * $this->items[$id.$color]['price'];
            unset($this->items[$id.$color]);

        }

    }
    public function update_color($id,$old_color,$new_color){
        if(array_key_exists($id.$new_color, $this->items)){
            return -1;
        }
        else{
            $this->items[$id.$old_color]['color'] = $new_color;
            $this->items[$id.$new_color] = $this->items[$id.$old_color];
            unset($this->items[$id.$old_color]);
        }
            return 1;
    }
    public function update_quantity($id,$color,$quantity) {

        //reset qty and price in the cart ,
        $this->totalQty -= $this->items[$id.$color]['quantity'] ;
        $this->totalPrice -= $this->items[$id.$color]['price'] * $this->items[$id.$color]['quantity']   ;
        // add the item with new qty
        $this->items[$id.$color]['quantity'] = $quantity;

        // total price and total qty in cart
        $this->totalQty += $quantity ;
        $this->totalPrice += $this->items[$id.$color]['price'] * $quantity ;

    }
}
