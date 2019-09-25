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
                                    <li class="category3"><span>Liên hệ</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumbs area end -->
            <!-- contact-details start -->
            <div class="main-contact-area">
                <div class="container">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="contact-us-area">
                                <!-- google-map-area start -->
                                <div class="row">
                                    <div class="google-map-area">
                                        <!--  Map Section -->
                                        <div id="contacts" class="map-area col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                            <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=590%20C%C3%A1ch%20M%E1%BA%A1ng%20Th%C3%A1ng%208%2C%20Ph%C6%B0%E1%BB%9Dng%2011%2C%20Qu%E1%BA%ADn%203&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/best-wordpress-themes/">multipurpose</a></div><style>.mapouter{position:relative;text-align:right;height:400px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:600px;}</style></div>
                                        </div>    
                                    </div>
                                </div>
                                <!-- google-map-area end -->
                                <!-- contact us form start -->
                                <div class="row">
                                    <div class="contact-us-form">                                    
                                        <div class="contact-form">
                                            <span class="legend">Mời bạn điền thông tin liên hệ</span>
                                            <form action="" method="post">
                                            {{ csrf_field() }}
                                                <div class="form-top">                                                
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                                        <label>Họ tên <sup>*</sup></label>
                                                        <input type="text" name="ct_name" class="form-control">
                                                        @if($errors->has('ct_name'))
                                                        <div class="has-error">
                                                            <p class="help-block">
                                                                {{$errors->first('ct_name')}}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    </div>                                                
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                                        <label>Email <sup>*</sup></label>
                                                        <input type="text" name="ct_email" class="form-control">
                                                        @if($errors->has('ct_email'))
                                                        <div class="has-error">
                                                            <p class="help-block">
                                                                {{$errors->first('ct_email')}}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    </div>                                                										
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                                        <label>Số điện thoại <sup>*</sup></label>
                                                        <input type="text" name="ct_phone" class="form-control">
                                                        @if($errors->has('ct_phone'))
                                                        <div class="has-error">
                                                            <p class="help-block">
                                                                {{$errors->first('ct_phone')}}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    </div>	
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                                        <label>Tiêu đề <sup>*</sup></label>
                                                        <input type="text" name="ct_title" class="form-control">
                                                        @if($errors->has('ct_title'))
                                                        <div class="has-error">
                                                            <p class="help-block">
                                                                {{$errors->first('ct_title')}}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    </div>	
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                                        <label>Nội dung <sup>*</sup></label>
                                                        <textarea class="yourmessage" name="ct_content"></textarea>
                                                        @if($errors->has('ct_content'))
                                                        <div class="has-error">
                                                            <p class="help-block">
                                                                {{$errors->first('ct_content')}}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    </div>												
                                                </div>                                               
                                                <div class="submit-form form-group col-sm-12 submit-review">
                                                    <p><sup>*</sup> Bắt buộc nhập</p>
                                                    <div class="actions-log">
                                                        <input type="submit" class="button" value="Gửi liên hệ">
                                                    </div>
                                                </div>                                           
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- contact us form end -->
                            </div>					
                        </div>                    
                </div>	
            </div>
            <!-- contact-details end -->
@endsection