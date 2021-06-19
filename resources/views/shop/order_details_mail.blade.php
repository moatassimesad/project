@component('mail::message')
# Hello {{$lastName}} {{$firstName}} your order was {{$status}} !
<h3>Order Nº: {{$order->number}}</h3>
<div class="row">
   <h3>Total : <span style="font-size: small; color: green">MAD {{$order->payedTotal}}</span></h3>
</div>
<hr>
@foreach($order->products as $product)
    <div class="row">
        <h4>Product name : <span style="font-size: small;">{{ $product->name  }}</span> </h4>
        <h4>Product price : <span style="font-size: small; color: green">MAD {{ $product->price  }}</span></h4>
        @if($product->pivot->color!="none")
        <h4>Product color : <span style="font-size: small; color: {{$product->pivot->color}}">{{ $product->pivot->color  }}</span></h4>
        @endif
        <h4>Product quantity : <span style="font-size: small;">{{ $product->pivot->quantity  }}</span></h4>
        <h4>Total : <span style="font-size: small; color: green;">MAD {{ $product->pivot->quantity *  $product->price}}</span></h4>
        <hr>
    </div>
@endforeach
@component('mail::button', ['url' => route('shop',['id'=>$store->id,'collection_id'=>'all'])])
Continue shopping
@endcomponent

<div style="text-align: center;">Sent u with ❤️ from {{ $store->name }}</div>
@endcomponent
