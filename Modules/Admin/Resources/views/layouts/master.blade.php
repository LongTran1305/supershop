<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
{{-- <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> --}}
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('backend/js/raphael-min.js')}}"></script>
<script src="{{asset('backend/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href={{URL::to('/admin/')}} class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{URL::to('backend/images/2.png')}}">
                <span class="username">
				</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
				<li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="{{ \Request::route()->getName() == 'admin.home' ? 'active' : '' }}" href={{route('admin.home')}}>
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
				
				<li class="sub-menu">
                    <a class="{{ \Request::is('*/category/*') ? 'active' : '' }}" href="javascript:;">
                        <i class="fa fa-list"></i>
                        <span>Danh mục</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{ \Request::route()->getName() == 'admin.get.list.category' ? 'active' : '' }}" href="{{route('admin.get.list.category')}}">Liệt kê danh mục</a></li>
                        <li><a class="{{ \Request::route()->getName() == 'admin.get.create.category' ? 'active' : '' }}" href="{{route('admin.get.create.category')}}">Thêm mới danh mục</a></li>
                    </ul>
				</li>  
				
                <li class="sub-menu">
                    <a class="{{ \Request::is('*/product/*') ? 'active' : '' }}" href="javascript:;">
                        <i class="fa fa-product-hunt"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{ \Request::route()->getName() == 'admin.get.list.product' ? 'active' : '' }}" href="{{route('admin.get.list.product')}}">Liệt kê sản phẩm</a></li>
                        <li><a class="{{ \Request::route()->getName() == 'admin.get.create.product' ? 'active' : '' }}" href="{{route('admin.get.create.product')}}">Thêm mới sản phẩm</a></li>
                    </ul>
				</li>   

				<li class="sub-menu">
					<a class="{{ \Request::is('*/article/*') ? 'active' : '' }}" href="javascript:;">
						<i class="fa fa fa-newspaper-o"></i>
						<span>Tin tức</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{ \Request::route()->getName() == 'admin.get.list.article' ? 'active' : '' }}" href="{{route('admin.get.list.article')}}">Tin tức</a></li>
                        <li><a class="{{ \Request::route()->getName() == 'admin.get.create.article' ? 'active' : '' }}" href="{{route('admin.get.create.article')}}">Thêm tin mới</a></li>
                    </ul>
				</li>   
				
				<li class="sub-menu">
					<a class="{{ \Request::route()->getName() == 'admin.get.list.transaction' ? 'active' : '' }}" href="{{ route('admin.get.list.transaction') }}">
						<i class="fa fa-first-order"></i>
						<span>Đơn hàng</span>
					</a>
                </li>  

                <li class="sub-menu">
                        <a class="{{ \Request::route()->getName() == 'admin.get.list.user' ? 'active' : '' }}" href="{{ route('admin.get.list.user') }}">
                            <i class="fa fa-user"></i>
                            <span>Thành viên</span>
                        </a>
                    </li>  

			</ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">

		@yield('content')

 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2019 Visitors. All rights reserved | Design by W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('backend/js/bootstrap.js')}}"></script>
<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
        $('#output_img').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
        }
    }

    $("#input_img").change(function() {
    readURL(this);
    });
</script>
@yield('script')
</body>
</html>
