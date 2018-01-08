@extends('admin.layouts.master')
@section('content')
<!-- BEGIN CONTENT -->
     <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Trang chủ</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Hóa Đơn</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Chi Tiết Hóa Đơn</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <a href="{{asset('export-order/'.$getOrderById->id)}}" class="btn green btn-sm"> Xuất hóa đơn</a>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">Thông Tin Hóa Đơn
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- CONTENT -->
             @if(Session::has('flash_message'))
                    <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
            @endif
            <form class="form-horizontal" action="" method="POST" role="form">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                        
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mã Hóa Đơn</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$getOrderById->orderCode}}" required name="orderCode" class="form-control" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bệnh Nhân</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$getOrderById->Patient->fullname}}" required name="patientId" class="form-control" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Trạng Thái</label>
                                    <div class="col-md-6" style="padding-top: 10px">
                                        @if($getOrderById->status == "new")
                                            <span class="label label-warning">Hóa đơn mới</span>
                                        @elseif($getOrderById->status == "confirm")
                                            <span class="label label-success">Đã thanh toán</span>
                                        @else
                                            <span class="label label-danger">Đã hủy</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                    </div>
                    <!-- END INFO LEFT -->
                    <div class="col-md-6">
                            <div class="form-body">
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">BHYT</label>
                                    <div class="col-md-6" style="padding-top: 10px">
                                        <!-- if($getOrderById->status == "new") -->
                                            <!-- <span class="label label-success">Áp dụng</span> -->
                                        <!-- else -->
                                            <span class="label label-danger">Không</span>
                                        <!-- endif -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Giảm BHYT</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{number_format(0)}}đ" required name="price" class="form-control" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tổng Cộng</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{number_format($getOrderById->totalAmount)}}đ" required name="price" class="form-control" disabled="">
                                    </div>
                                </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h1 class="page-title">Dịch Vụ Sử Dụng</h1>
                
                <div class="col-md-offset-2 col-md-8">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Dịch Vụ</th>
                                <th>Loại DV</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $i = 1;?>
                        @if(count($services) > 0)
                            
                            @foreach($services as $service)
                                <tr>
                                    <th>{{$i}}</th>
                                    <th>{{$service->Service->name}}</th>
                                    <th>{{$service->Service->serviceCode}}</th>
                                    <th>{{number_format($service->Service->price)}}đ</th>
                                </tr>
                            <?php $i++; ?>
                            @endforeach
                        @else
                            <tr>
                                <th>{{$i}}</th>
                                <th>Khám thường</th>
                                <th>BT</th>
                                <th>250,000đ</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="col-md-12">
                <h1 class="page-title">Toa Thuốc</h1>
                
                <div class="col-md-offset-2 col-md-8">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Thuốc</th>
                                <th>ĐVT</th>
                                <th>Số Lượng</th>
                                <th>Đơn Giá</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>

                        <tbody>
                        @if(count($medicines) > 0)
                            <?php $i = 1;?>
                            @foreach($medicines as $medicine)
                                <tr>
                                    <th>{{$i}}</th>
                                    <th>{{$medicine->Medicine->name}}</th>
                                    <th>{{$medicine->Medicine->Unit->name}}</th>
                                    <th>{{$medicine->amount}}</th>
                                    <th>{{number_format($medicine->Medicine->price)}}đ</th>
                                    <th>{{number_format($medicine->totalPrice)}}đ</th>
                                </tr>
                            <?php $i++; ?>
                            @endforeach
                        @else
                            <tr><th colspan='5'> <center>Không có thuốc được chọn</center></th></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            
             <!-- END CONTENT -->
             <div class="row">
                <div class="col-md-12">
                    <div class="text-center" style="margin-top:30px;">
                        <a href="{{asset('order')}}" class="btn btn-default" >
                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Quay Lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
        </form>
    </div>
    <!-- END CONTENT -->
@endsection

<script src="{!!url('global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function()
        {
            $('#reportAdd').fadeOut();
        },4000);
    })
</script>