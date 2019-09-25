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
                                        <a href="index.html">Home</a>
                                        <span><i class="fa fa-angle-right"></i></span>
                                    </li>
                                    <li class="category3"><span>Đăng ký</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumbs area end -->
            <!-- account-details Area Start -->
            <div class="customer-login-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="customer-register my-account">
                                <form action="" method="post" class="register">
                                    {{ csrf_field() }}
                                    <div class="form-fields">
                                        <h2>Đăng ký</h2>
                                        <p class="form-row form-row-wide">
                                                <label for="username">Họ tên<span class="required">*</span></label>
                                                <input type="text" class="input-text" name="name" id="username" value="">
                                                @if($errors->has('name'))
                                                <div class="has-error">
                                                    <p class="help-block">
                                                        {{$errors->first('name')}}
                                                    </p>
                                                </div>
                                                @endif
                                            </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Email<span class="required">*</span></label>
                                            <input type="text" class="input-text" name="email" id="reg_email" value="">
                                            @if($errors->has('email'))
                                                <div class="has-error">
                                                    <p class="help-block">
                                                        {{$errors->first('email')}}
                                                    </p>
                                                </div>
                                            @endif
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_password">Mật khẩu <span class="required">*</span></label>
                                            <input type="password" class="input-text" name="password" id="reg_password">
                                            @if($errors->has('password'))
                                            <div class="has-error">
                                                <p class="help-block">
                                                    {{$errors->first('password')}}
                                                </p>
                                            </div>
                                            @endif
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="phone">Số điện thoại <span class="required">*</span></label>
                                            <input type="text" class="input-text" name="phone" id="phone" value="">
                                            @if($errors->has('phone'))
                                            <div class="has-error">
                                                <p class="help-block">
                                                    {{$errors->first('phone')}}
                                                </p>
                                            </div>
                                            @endif
                                        </p>                                        
                                    </div>
                                    <div class="form-action">
                                        <div class="actions-log">
                                            <input type="submit" class="button" name="register" value="Đăng ký">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- account-details Area end -->
@endsection
