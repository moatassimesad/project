@component('mail::message')
# Hello {{$lastName}} {{$firstName}} your order was confirmed !
<h3>Order :</h3> {{$order->id}}
<div class="row">
   <h3>Total : </h3> MAD {{$order->payedTotal}} <br><br><br>
</div>
@foreach($order->products as $product)
    <div class="row">
        <h4>Product name : </h4> {{ $product->name  }}
        <h4>Product price : </h4> MAD {{$product->price}}
        <hr>
    </div>
@endforeach
@component('mail::button', ['url' => route('shop',['id'=>$store->id,'collection_id'=>'all'])])
Continue shopping
@endcomponent

Thanks,<br>
{{ $store->name }}
@endcomponent
