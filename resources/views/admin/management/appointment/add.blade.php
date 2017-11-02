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
                        <a href="#">Lịch Hẹn</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Lịch Hẹn</span>
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
            <h1 class="page-title">Lịch Hẹn
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ngày khám</label>
                                    <div class="col-md-6">
                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                            <input type="text" class="form-control" >
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bệnh nhân</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mã bệnh nhân</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Giới tính</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ngày sinh</label>
                                    <div class="col-md-6">
                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                            <input type="text" class="form-control" >
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Điện thoại</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Lý do khám</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Triệu chứng</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Chuyên khoa</label>
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option>Nội</option>
                                            <option>Nữ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Chọn bác sĩ</label>
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option>Nam</option>
                                            <option>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END INFO LEFT -->
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Giá</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phụ thu</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mã khuyến mãi</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ghi chú</label>
                                    <div class="col-md-6">
                                        <textarea type="text" class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Công ty bảo hiểm</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Trạng thái tiền</label>
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option>Thanh toán</option>
                                            <option>Hà Nội</option>
                                        </select>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center" style="margin-top:30px;">
                            <button type="button" class="btn btn-primary" >
                                <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                            </button>
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh 
                            </button>
                            <button type="button" class="btn btn-default" >
                                <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                            </button>
                    </div>
                </div>
            </div>
             <!-- END CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection