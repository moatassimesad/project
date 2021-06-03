@component('mail::message')
# Hello {{$lastName}} {{$firstName}} your order was confirmed !
<div class="row">
   # Total : MAD {{$order->payedTotal}}
</div>
@foreach($order->products as $product)
    <div class="row">
        {{ $product->name  }} MAD {{$product->price}}
    </div>
@endforeach
@component('mail::button', ['url' => route('shop',['id'=>$store->id,'collection_id'=>'all'])])
Continue shopping
@endcomponent

Thanks,<br>
{{ $store->name }}
@endcomponent
