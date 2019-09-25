@extends('admin::layouts.master')

@section('content')

<section class="wrapper">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li class="active"><a href="{{route('admin.get.list.user')}}">Thành viên</a></li>
        </ol>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Quản lý thành viên
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:20%;">Tên hiển thị</th>
                            <th style="width:20%;">Email</th>                            
                            <th style="width:20%;">Phone</th> 
                            <th>Hình ảnh</th>                           
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($users))
                        @foreach ($users as $user) 
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->avatar}}</td>
                            <td style="text-align: center">
                                <span style="padding: 5%"><a href="{{route('admin.get.edit.user',$user->id)}}"><i class="fa fa-pencil-square text-success"></i></a></span>
                                <span><a href="{{route('admin.get.action.user',['delete',$user->id])}}"><i class="fa fa-recycle text-danger"></i></a></span>                                
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