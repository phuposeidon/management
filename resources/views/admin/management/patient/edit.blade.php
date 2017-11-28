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
                        <a href="#">Bệnh Nhân</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Sửa Bệnh Nhân</span>
                    </li>
                </ul>

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
            <form class="form-horizontal" action="{{route('editPatient',['id'=>$patient->id])}}" role="form" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Họ Tên</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$patient['fullname']}}" required name="fullname" class="form-control" placeholder="">
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ngày Sinh</label>
                                    <div class="col-md-6">
                                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                            <input type="text" value="{{Carbon\Carbon::Parse($patient->DOB)->format('d-m-Y')}}" required name="birthday" class="form-control" >
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
                                        <select name="gender" class="form-control">
                                            <option value="1" @if($patient->gender == 1)
                                            selected 
                                        @endif>Nam</option>
                                            <option value="0" @if($patient->gender == 0)
                                            selected 
                                        @endif>Nữ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">CMND</label>
                                    <div class="col-md-6">
                                        <input type="number" value="{{$patient->passport}}" required name="passport" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Số Điện Thoại</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$patient->phone}}" required name="phone" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" name="username" value="{{$patient->username}}" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input value="{{$patient['email']}}" type="email" required name="email" class="form-control" placeholder=""> </div>
                                    </div>
                                </div>

                                
                                {{--  <div class="form-group">
                                    <label class="col-md-3 control-label">Mật Khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control spinner" placeholder="Password"> </div>
                                </div>  --}}
                            </div>
                    </div>
                    <!-- END INFO LEFT -->
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tôn Giáo</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$patient['religion']}}" name="religion" class="form-control" placeholder="  ">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Quốc Gia</label>
                                    <div class="col-md-6">
                                        <input type="text" value="Việt Nam" disabled name="religion" class="form-control" placeholder="  ">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Địa chỉ</label>
                                    <div class="col-md-6">
                                        <textarea name="address" class="form-control" rows="2">{{$patient['address']}}</textarea>
                                        
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nhóm Máu</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="bloodgroup">
                                            <option value="A">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="AB+">AB+</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Dị Ứng</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$patient['allergic']}}" name="allergic" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <div class="mt-checkbox-list">
                                            <label class="mt-checkbox mt-checkbox-outline">
                                                <input name="active" value="1" 
                                                @if($patient->active==1)
                                                    checked
                                                @endif
                                                 type="checkbox">Hoạt Động
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
                                        <input name="cardCode" value="@if(isset($insurance[0]['id'])) {{$insurance[0]['cardCode']}} @endif" type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Từ Ngày</label>
                                    <div class="col-md-6">
                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                                            <input name="fromdate" value="@if(isset($insurance[0]['id'])) {{Carbon\Carbon::Parse($insurance[0]['fromDate'])->format('d-m-Y')}} @endif" type="text" class="form-control" >
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
                                <label class="col-md-3 control-label">Nơi Đăng Ký</label>
                                <div class="col-md-6">
                                    <input name="placeCheck" value="@if(isset($insurance[0]['id'])) {{$insurance[0]['placeCheck']}} @endif" type="text" name="insurrentcode" class="form-control" placeholder="  ">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Đến Ngày</label>
                                <div class="col-md-6">
                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                        <input name="todate" value="@if(isset($insurance[0]['id'])) {{Carbon\Carbon::Parse($insurance[0]['toDate'])->format('d-m-Y')}} @endif" type="text" class="form-control" >
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
                        <button type="button" class="btn btn-default" >
                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                        </button>
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

