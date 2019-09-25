@extends('admin::layouts.master')

@section('content')

<section class="wrapper">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
        <li><a href="{{route('admin.get.list.product')}}">Sản phẩm</a></li>
        <li class="active">Danh sách</li>
    </ol>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-body">                
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ \Request::get('name') }}" placeholder="Tên bài viết...">
                        </div>
                        <div class="form-group">
                            <select name="cate" id="" class="form-control" >
                                <option value="">Danh mục</option>
                                @if (isset($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : '' }}>{{ $category->c_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>                
            </div>
            <div class="panel-heading">
                Danh mục sản phẩm
                <a href="{{route('admin.get.create.product')}}" style="float: right"><i class="fa fa-plus-circle text-success"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:40%;">Tên sản phẩm</th>
                            <th style="width:15%;">Loại sản phẩm</th>
                            <th style="width:15%;">Hình ảnh</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center">Nổi bật</th>
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($products))
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{ $product->pro_name }}
                                <ul style="padding-left: 5%">
                                    <li><span>Giá: </span><span>{{ number_format($product->pro_price,0,',','.') }} VNĐ</span></li>
                                    <li><span>Khuyến mãi: </i></span><span>{{$product->pro_sale}} %</span></li>
                                </ul>
                            </td>
                            <td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N/A]' }}</td>
                            <td>
                                <img src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" width="80rem">
                            </td>
                            <td style="text-align: center">
                                <a href="{{ route('admin.get.action.product',['active',$product->id]) }}" class="label {{$product->getStatus($product->pro_active)['class']}}">{{$product->getStatus($product->pro_active)['name']}}</a>
                            </td>
                            <td style="text-align: center">
                                <a href="{{ route('admin.get.action.product',['hot',$product->id]) }}" class="label {{$product->getHot($product->pro_hot)['class']}}">{{$product->getHot($product->pro_hot)['name']}}</a>
                            </td>
                            <td style="text-align: center">
                                <span style="padding: 5%"><a href="{{route('admin.get.edit.product',$product->id)}}"><i class="fa fa-pencil-square text-success"></i></a></span>
                                <span><a href="{{route('admin.get.action.product',['delete',$product->id])}}"><i class="fa fa-recycle text-danger"></i></a></span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection