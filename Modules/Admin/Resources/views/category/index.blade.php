@extends('admin::layouts.master')

@section('content')

<section class="wrapper">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.category')}}">Danh mục</a></li>
            <li class="active">Danh sách</li>
        </ol>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục sản phẩm
                <a href="{{route('admin.get.create.category')}}" style="float: right"><i class="fa fa-plus-circle text-success"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:35%;">Tên danh mục</th>
                            <th style="width:40%;">Title seo</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($categories))
                        @foreach ($categories as $category) 
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->c_name}}</td>
                            <td>{{$category->c_title_seo}}</td>
                            <td style="text-align: center"><a href="{{ route('admin.get.action.category',['active',$category->id]) }}" class="label {{$category->getStatus($category->c_active)['class']}}">{{$category->getStatus($category->c_active)['name']}}</a></td>
                            <td style="text-align: center">
                                <span style="padding: 5%"><a href="{{route('admin.get.edit.category',$category->id)}}"><i class="fa fa-pencil-square text-success"></i></a></span>
                                <span><a href="{{route('admin.get.action.category',['delete',$category->id])}}"><i class="fa fa-recycle text-danger"></i></a></span>                                
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