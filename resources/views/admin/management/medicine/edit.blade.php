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
                        <a href="#">Thuốc</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Thêm Thuốc</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="#">
                                    <i class="icon-bell"></i> Action</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-shield"></i> Another action</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i> Something else here</a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="#">
                                    <i class="icon-bag"></i> Separated link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">Thêm Thuốc Mới
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- CONTENT -->
             @if(Session::has('flash_message'))
                    <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
            @endif
            <form class="form-horizontal" action="{{route('postMedicine',['id'=>$medicine->id])}}" method="POST" role="form">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                        
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tên Thuốc</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$medicine['name']}}" required name="name" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                {{--  <div class="form-group">
                                    <label class="col-md-3 control-label">Mã thuốc BHYT</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Số đăng ký</label>
                                    <div class="col-md-6">
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input type="text" class="form-control" placeholder=""> </div>
                                    </div>
                                </div>  --}}

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nồng độ</label>
                                    <div class="col-md-6">
                                        <input type="number" value="{{$medicine->concentration}}" required name="concentration" class="form-control spinner" placeholder=""> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nơi Sản Xuất</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$medicine->madeIn}}" required name="madeIn" class="form-control spinner" placeholder=""> </div>
                                </div>
                                {{--  <div class="form-group">
                                    <label class="col-md-3 control-label">Nhóm</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control spinner" placeholder=""> </div>
                                </div>  --}}
                                {{--  <div class="form-group">
                                    <label class="col-md-3 control-label">Dược chất chính</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control spinner" placeholder=""> </div>
                                </div>  --}}

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Đơn Vị</label>
                                    <div class="col-md-6">
                                        <select name="unit"  class="form-control">
                                        @foreach($allUnits as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <!-- END INFO LEFT -->
                    <div class="col-md-6">
                            <div class="form-body">
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Giá</label>
                                    <div class="col-md-6">
                                        <input type="number" value="{{$medicine->price}}" required name="price" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                {{--  <div class="form-group">
                                    <label class="col-md-3 control-label">Giá thầu</label>
                                    <div class="col-md-6">
                                        <input type="text" name="expectancy" class="form-control" placeholder="  ">
                                    </div>
                                </div>  --}}
                                
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Thời Gian</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$medicine->expectancy}} Tháng" name="expectancy" class="form-control" placeholder="  ">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tiêu chuẩn</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$medicine->standard}}" required name="standard" class="form-control" placeholder="  ">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ghi Chú</label>
                                    <div class="col-md-6">
                                    <textarea rows="5" name="note" value="{{$medicine->note}}" class="form-control" style="">{{$medicine->note}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <div class="mt-checkbox-list">
                                            <label class="mt-checkbox mt-checkbox-outline">
                                                <input checked type="checkbox">Hoạt Động
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                    </div>
                </div>
            </div>
             <!-- END CONTENT -->
             <div class="row">
                <div class="col-md-12">
                    <div class="text-center" style="margin-top:30px;">
                        <button  type="submit" class="btn btn-primary" >
                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                        </button>
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh 
                        </button>
                        <a href="{{route('getlist')}}" class="btn btn-default" >
                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
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