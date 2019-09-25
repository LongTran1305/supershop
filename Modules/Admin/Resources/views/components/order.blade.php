@if($orders)
<div class="table-responsive">
<table class="table table-striped b-t b-light">
    <thead>
        <tr>
            <th style="width:5%;">STT</th>
            <th style="width:25%;">Tên sản phẩm</th>
            <th style="width:20%;">Hình ảnh</th>
            <th style="width:10%;">Giá</th>
            <th style="width:10%;">SL</th>
            <th>Thành tiền</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        @foreach ($orders as $key => $order)
        <tr>
            <td>#{{ $i }}</td>
            <td>
                <a href="{{ route('get.detail.product',[str_slug($order->product->pro_name),$order->or_product_id]) }}" target="_blank">{{ isset($order->product->pro_name) ? $order->product->pro_name : '' }}</a>
            </td>
            <td>
                <a href="{{ route('get.detail.product',[str_slug($order->product->pro_name),$order->or_product_id]) }}" target="_blank"><img src="{{ isset($order->product->pro_avatar) ? asset(pare_url_file($order->product->pro_avatar)) : '' }}" class="img img-responsive" alt=""></a>
            </td>
            <td>{{ number_format($order->or_price,0,',','.').'đ' }} </td>
            <td>{{ $order->or_qty }}</td>
            <td>{{ number_format($order->or_qty * $order->or_price,0,',','.').'đ' }}</td>
            <td>
                <a href=""><i class="fa fa-trash"></i> Xóa</a>
            </td>
        </tr>
        <?php $i++ ?>
        @endforeach        
    </tbody>
</table>
</div>
@endif