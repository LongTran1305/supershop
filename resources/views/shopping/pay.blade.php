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
                                    <li class="home">
                                            <a href="{{ route('get.list.shopping.cart') }}">Giỏ hàng</a>
                                            <span><i class="fa fa-angle-right"></i></span>
                                        </li>
                                    <li class="category3"><span>Thanh toán</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumbs area end -->
            <div class="cart-area-start">
            <div class="container wrapper"> 
                    <div class="row cart-body">
                        <form class="form-horizontal" method="post" action="">
                            {{ csrf_field() }}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                            <!--REVIEW ORDER-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Giỏ hàng <div class="pull-right"><small><a class="afix-1" href="{{ route('get.list.shopping.cart') }}">Cập nhật giỏ hàng</a></small></div>
                                </div>
                                <div class="panel-body">
                                    @foreach ($products as $product)                                        
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="{{ asset(pare_url_file($product->options->avatar)) }}" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">{{ $product->name }}</div>
                                            <div class="col-xs-12"><small>Số lượng: <span>{{ $product->qty }}</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <span>{{ number_format($product->qty * $product->price,0,',','.').'đ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                    @endforeach
                                    
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <strong>Tổng tiền: </strong>
                                            <div class="pull-right"><span>{{ Cart::subtotal() }}</span><span> VNĐ</span></div>
                                        </div>                                        
                                    </div>                                                                       
                                </div>
                            </div>
                            <!--REVIEW ORDER END-->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                            <!--SHIPPING METHOD-->
                            <div class="panel panel-default">
                                <div class="panel-heading">Thông tin thanh toán</div>
                                <div class="panel-body">                                                                   
                                    
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="tr_address" class="form-control" value="" />
                                            @if($errors->has('tr_address'))
                                            <div class="has-error">
                                                <p class="help-block">
                                                    {{$errors->first('tr_address')}}
                                                </p>
                                            </div>
                                            @endif
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Email:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="tr_email" class="form-control" value="{{ get_data_user('web','email') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Số điện thọai:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="tr_phone" class="form-control" value="{{ get_data_user('web','phone') }}" />
                                            @if($errors->has('tr_phone'))
                                            <div class="has-error">
                                                <p class="help-block">
                                                    {{$errors->first('tr_phone')}}
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                        <div class="col-md-12">
                                            <textarea name="tr_node" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="submit-form form-group submit-review">
                                        <div class="actions-log col-md-12">
                                            <input type="submit" class="button" value="Xác nhận thông tin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--SHIPPING METHOD END-->
                        </div>                        
                        </form>
                    </div>
                    <div class="row cart-footer">
                
                    </div>
            </div>
            </div>
                                
@endsection