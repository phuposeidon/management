@extends('admin.layouts.master')
@section('content')
<!-- BEGIN CONTENT -->
     <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler"> </div>
                <div class="toggler-close"> </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
                        <span> THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                        </ul>
                    </div>
                    <div class="theme-option">
                        <span> Layout </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Header </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Top Menu Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Mode</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Style </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Footer </span>
                        <select class="page-footer-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END THEME PANEL -->
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
                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Công cụ
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="{{asset('export-order/'.$getOrderById->id)}}">
                                    <i class="icon-bell"></i> Xuất hóa đơn </a>
                            </li>
                        </ul>
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

                            </div>
                    </div>
                    <!-- END INFO LEFT -->
                    <div class="col-md-6">
                            <div class="form-body">
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tổng Cộng</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{number_format($getOrderById->totalAmount)}}đ" required name="price" class="form-control" disabled="">
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
            </div>

            <div class="col-md-12">
                <h1 class="page-title">Dịch Vụ Sử Dụng</h1>
                
                @foreach($services as $service)
                <!-- Left side order service -->
                <div class="col-md-6">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Tên Dịch Vụ </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" disabled="" value="{{$service->Service->name}}">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End left side order service -->

                <!-- Right side order service -->
                <div class="col-md-6">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"> Giá</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{number_format($service->Service->price)}}đ" disabled>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End right side order service -->
                @endforeach

            </div>

            <div class="col-md-12">
                <h1 class="page-title">Toa Thuốc</h1>
                
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Thuốc</th>
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