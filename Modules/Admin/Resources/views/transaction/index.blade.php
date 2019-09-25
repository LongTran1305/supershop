@extends('admin::layouts.master')

@section('content')

<section class="wrapper">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.transaction')}}">Đơn hàng</a></li>
            <li class="active">Danh sách</li>
        </ol>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Quản lý đơn hàng
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:20%;">Tên khách hàng</th>
                            <th style="width:30%;">Địa chỉ</th>
                            <th style="width:10%;">Số ĐT</th>
                            <th style="width:15%;">Tổng tiền</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($transactions))
                        @foreach ($transactions as $transaction) 
                        <tr>
                            <td>{{$transaction->id}}</td>
                            <td>{{ isset($transaction->user->name) ? $transaction->user->name : '[N/A]' }}</td>
                            <td>{{ $transaction->tr_address }}</td>
                            <td>{{ $transaction->tr_phone }}</td>
                            <td>{{ number_format($transaction->tr_total,0,',','.') }} VNĐ</td>
                            <td style="text-align: center">
                                @if ($transaction->tr_status == 1)
                                <a href="" class="label label-info">Đã xử lý</a>
                                @else
                                <a href="" class="label label-default">Chờ xử lý</a>
                                @endif
                            </td>
                            <td style="text-align: center">
                                <span><a class="js_order_item" data-id="{{ $transaction->id }}" href="{{route('admin.get.view.order',$transaction->id)}}"><i class="glyphicon glyphicon-zoom-in text-success"></i></a></span>
                                <span><a href=""><i class="fa fa-recycle text-danger"></i></a></span>                               
                            </td>
                        </tr>
                        @endforeach              
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="myModalOrder" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
      
          <!-- Modal content-->
          <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading">
              Chi tiết mã đơn hàng #<b class="transaction_id"></b>
            </div>
            <div class="modal-body" id="md_content">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
          </div>
      
        </div>
    </div>

</section>

@endsection

@section('script')
    <script>
    $(function(){
        $(".js_order_item").click(function(event){
            event.preventDefault();
            let $this = $(this);
            let url = $this.attr('href');
            $("#md_content").html('');
            $(".transaction_id").text('').text($this.attr('data-id'));
            $("#myModalOrder").modal('show');

            $.ajax({
                url: url,
            }).done(function(result){
                console.log(result);
                if(result){
                    $("#md_content").append(result);
                }
            })
        })
    })
    </script>
@endsection