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
                        <a href="#">Bệnh Nhân</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Thêm Bệnh Nhân</span>
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
            <h1 class="page-title">Thông Tin Bệnh Nhân
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- CONTENT -->
            @if(Session::has('flash_message'))
                    <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger col-sm-12" class="reportAdd">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>

            @endif
            <form class="form-horizontal" action="{{asset('add-patient')}}" role="form" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Họ Tên</label>
                                    <div class="col-md-6">
                                        <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control" placeholder="">
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ngày Sinh</label>
                                    <div class="col-md-6">
                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                            <input type="text" name="DOB" value="{{old('DOB')}}" class="form-control" >
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Giới Tính</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="gender">
                                            <option value="1" @if(old('gender') == 1) selected @endif>Nam</option>
                                            <option value="0" @if(old('gender') == 0) selected @endif>Nữ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">CMND</label>
                                    <div class="col-md-6">
                                        <input type="number" name="passport" value="{{old('passport')}}" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Số Điện Thoại</label>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder=""> </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="  ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mật Khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control spinner" placeholder="Password"> </div>
                                </div>
                            </div>
                    </div>
                    <!-- END INFO LEFT -->
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tôn Giáo</label>
                                    <div class="col-md-6">
                                        <input type="text" name="religion" class="form-control" value="{{old('religion')}}" placeholder="  ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Địa Chỉ</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address" class="form-control" value="{{old('address')}}" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Quốc Gia</label>
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option>Việt Nam</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nhóm Máu</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="bloodgroup">
                                            <option value="">Chưa biết</option>
                                            <option value="A" @if(old('bloodgroup') == "A") selected @endif>A</option>
                                            <option value="B" @if(old('bloodgroup') == "B") selected @endif>B</option>
                                            <option value="O" @if(old('bloodgroup') == "O") selected @endif>O</option>
                                            <option value="AB" @if(old('bloodgroup') == "AB") selected @endif>AB</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Dị Ứng</label>
                                    <div class="col-md-6">
                                        <input type="text" name="allergic" class="form-control" placeholder="  " value="{{old('allergic')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ảnh Đại Diện</label>
                                    <div class="fileinput fileinput-new col-md-6" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="avatar"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <div class="mt-checkbox-list">
                                            <label class="mt-checkbox mt-checkbox-outline">
                                                <input name="active" value="1" type="checkbox">Hoạt Động
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
             <legend style="margin-left:15px;"><h1 class="page-title">Thông tin BHYT
            </h1></legend>
             <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Số BHYT</label>
                                    <div class="col-md-6">
                                        <input  type="text" name="cardCode" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Từ Ngày</label>
                                    <div class="col-md-6">
                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                                            <input name="fromdate" type="text" class="form-control" >
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nơi ĐK KCB BĐ</label>
                                <div class="col-md-6">
                                    <input name="placecheck" type="text" class="form-control" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Đến Ngày</label>
                                <div class="col-md-6">
                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                                        <input name="todate" type="text" class="form-control" >
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>

             </div>

             <div class="row">
                <div class="col-md-12">
                    <div class="text-center" style="margin-top:30px;">
                        <button  type="submit" class="btn btn-primary" >
                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                        </button>
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh 
                        </button>
                        <a href="{{route('patient')}}" class="btn btn-default" >
                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                        </a>
                    </div>
                </div>
            </div>
        </form>
             <!-- END CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection
<script src="global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function()
        {
            $('#reportAdd').fadeOut();
        },4000);
    })
</script>

