@extends('layouts.app')
@section('content')
		<!-- breadcrumbs area start -->
		<div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container-inner">
                                <ul>
                                    <li class="home">
                                        <a href="{{ asset('/') }}">Trang chủ</a>
                                        <span><i class="fa fa-angle-right"></i></span>
                                    </li>
                                    <li class="category3"><span>Giỏ hàng</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- breadcrumbs area end -->
            <div class="our-product-area new-product">
                    <div class="container">
                        <div class="area-title">
                            <h2>Giỏ hàng của bạn</h2>
                        </div>
                    </div>
            </div>
            <!-- Shopping Table Container -->
            <div class="cart-area-start">
                <div class="container">
                    <!-- Shopping Cart Table -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="cart-table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($products as $key => $product)                                            
                                        <tr>
                                            <td>#{{ $i }}</td>
                                            <td>
                                                <a href="{{ route('get.detail.product',[str_slug($product->name),$product->id]) }}" target="_blank">{{ $product->name }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('get.detail.product',[str_slug($product->name),$product->id]) }}" target="_blank"><img src="{{ asset(pare_url_file($product->options->avatar)) }}" class="img img-responsive" alt=""></a>
                                            </td>
                                            <td>{{ number_format($product->price,0,',','.').'đ' }} </td>
                                            <td>{{ $product->qty }}</td>      
                                            <td>{{ number_format($product->qty * $product->price,0,',','.').'đ' }}</td> 
                                            <td>
                                                <a href=""><i class="fa fa-pencil"></i> Sửa</a>
                                                <a href="{{ route('delete.shopping.cart',$key) }}"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>                                                                                       
                                        </tr>
                                        <?php $i++ ?>
                                        @endforeach

                                        <tr>
                                            <td class="actions-crt" colspan="7">
                                                <div class="">
                                                    <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="#">Continue Shopping</a></div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">UPDATE SHOPPING CART</a></div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="#">CLEAR SHOPPING CART</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Shopping Cart Table -->
                    <!-- Shopping Coupon -->
                    <div class="row">
                        <div class="col-md-12 vendee-clue">
                            <!-- Shopping Totals -->
                            <div class="shipping coupon cart-totals pull-right">
                                <ul>
                                    <li class="cartSubT">Tổng tiền:    <span>{{ Cart::subtotal() }} VNĐ</span></li>
                                </ul>
                                <a class="proceedbtn" href="{{ route('get.form.pay') }}">THANH TOÁN</a>                                
                            </div>
                            <!-- Shopping Totals -->
                        </div>
                    </div>
                    <!-- Shopping Coupon -->
                </div>	
            </div>
            <!-- Shopping Table Container -->
@endsection