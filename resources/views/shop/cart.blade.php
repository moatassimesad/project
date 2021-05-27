My Cart ( {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})
{{ print_r(session()->get('cart')) }}
