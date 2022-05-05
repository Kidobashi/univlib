<div class="barcode">
    <p class="name">{{$product->name}}</p>
    <p class="price">Price: {{$product->sale_price}}</p>
    {!! DNS1D::getBarcodeHTML($product->pid, "C128",1.4,22) !!}
    <p class="pid">{{$product->pid}}</p>
</div>