@extends('admin::layouts.master')

@section('content')

<section class="wrapper">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.product')}}">Sản phẩm</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center" style="width: 100%">
                                @include('admin::product.form')
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    @endsection