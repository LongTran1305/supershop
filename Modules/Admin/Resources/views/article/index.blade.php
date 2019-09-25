@extends('admin::layouts.master')

@section('content')

<section class="wrapper">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
        <li><a href="{{route('admin.get.list.article')}}">Bài viết</a></li>
        <li class="active">Danh sách</li>
    </ol>
    <div class="table-agile-info">
        <div class="panel panel-default">
                <div class="panel-body">                
                        <form class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ \Request::get('name') }}" placeholder="Tên sản phẩm...">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </form>                
                </div>
            <div class="panel-heading">
                Danh mục bài viết
                <a href="{{route('admin.get.create.article')}}" style="float: right"><i class="fa fa-plus-circle text-success"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:25%;">Tên bài viết</th>
                            <th style="width:15%;">Hình ảnh</th>
                            <th style="width:20%;">Mô tả</th>
                            <th style="width:15%">Ngày tạo</th>
                            <th style="text-align: center">Trạng thái</th>                            
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($articles))
                        @foreach ($articles as $article)
                        <tr>
                            <td>{{$article->id}}</td>
                            <td>{{$article->a_name}}</td>
                            <td>
                                <img src="{{ asset(pare_url_file($article->a_avatar)) }}" alt="" width="80rem">
                            </td>                                                      
                            <td>{{$article->a_description }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td style="text-align: center">
                                <a href="{{ route('admin.get.action.article',['active',$article->id]) }}" class="label {{$article->getStatus($article->pro_active)['class']}}">{{$article->getStatus($article->pro_active)['name']}}</a>
                            </td>
                            <td style="text-align: center">
                                <span style="padding: 5%"><a href="{{route('admin.get.edit.article',$article->id)}}"><i class="fa fa-pencil-square text-success"></i></a></span>
                                <span><a href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="fa fa-recycle text-danger"></i></a></span>
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