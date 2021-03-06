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
                        <a href="#">Người dùng</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Sửa Người Dùng</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">Thông Tin Người Dùng
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
             <form class="form-horizontal" action="{{route('postUser',['id'=>$user->id])}}" method="POST"  role="form" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="id" value="{{$user->id}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Họ Tên</label>
                                    <div class="col-md-6">
                                        <input type="text" name="fullname" value="{{$user->fullname}}" class="form-control" disabled>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Tài Khoản</label>
                                    <div class="col-md-6">
                                        <input type="text" name="username"  value="{{$user->username}}" class="form-control" disabled>
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ngày Sinh</label>
                                    <div class="col-md-6">
                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                            <input type="text" required name="DOB"  value="{{Carbon\Carbon::Parse($user->DOB)->format('d-m-Y')}}"  class="form-control" >
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
                                            <option value="1" @if($user->gender == 1)
                                            selected 
                                        @endif>Nam</option>
                                            <option value="0" @if($user->gender == 0)
                                            selected 
                                        @endif>Nữ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">CMND</label>
                                    <div class="col-md-6">
                                        <input name="passport" value="{{$user->passport}}"  type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Số Điện Thoại</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{$user->phone}}" name="phone" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder=""> </div>
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
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Chức Vụ</label>
                                    <div class="col-md-6">
                                        <select name="userType" class="form-control">
                                            <option value="Bác Sĩ" @if($user->userType == 'Bác Sĩ') selected @endif>Bác Sĩ</option>
                                            <option value-"Lễ Tân" @if($user->userType == 'Lễ Tân') selected @endif>Lễ Tân</option>
                                            <option value="Thu Ngân" @if($user->userType == "Thu Ngân") selected @endif>Thu Ngân</option>
                                            <option value="Admin" @if($user->userType == 'Admin') selected @endif>Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Chuyên Khoa</label>
                                    <div class="col-md-6">
                                        <select name="speciality" class="form-control">
                                            <option value="">Không có</option>
                                            @foreach($specialization as $doc)
                                            <option value="{{$doc->id}}" @if($doc->id == $user->specializationId) selected @endif>{{$doc->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Quốc Gia</label>
                                    <div class="col-md-6">
                                        <input name="country" value="Việt Nam" disabled type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Địa Chỉ</label>
                                    <div class="col-md-6">
                                        <input name="address" value="{{$user->address}}" type="text" class="form-control" placeholder="  ">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ghi Chú</label>
                                    <div class="col-md-6">
                                    <textarea rows="5" name="note" class="form-control" value="{{$user->note}}" style=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ảnh Đại Diện</label>
                                    <div class="fileinput fileinput-new col-md-6" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="{{asset('img/user/'.$user->avatar)}}" alt="" style="width:100%; height: 100%"/> </div>
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
                                                <input name="active" value="{{$user->active}}"
                                                    @if($user->active==1)
                                                    checked
                                                    @endif
                                                 type="checkbox">Hoạt Động
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
            
            <!-- *********** add "wage-disable" if user is not ADMIN **********-->
            <div class="col-md-12"> 
                <h1 class="page-title">Quản Lý Lương</h1>
                
                <!-- Left side WAGE -->
                <div class="col-md-6">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="" class="col-md-3">Lương Cơ Bản </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control wage-child" id="basicWage" name="basicWage" value="{{number_format($salary['basicWage'])}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-3">Lương Tháng Này </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{number_format($salary['basicWage'] * $salary['coefficient'] + 0.2 * $extraSalary)}}" disabled>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End left side WAGE -->

                <!-- Right side WAGE -->
                <div class="col-md-6">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="" class="col-md-3">Bậc Lương(B.Sĩ) </label>
                            <div class="col-md-6">
                                <select name="level" id="level" class="form-control wage-child">
                                    <option value="0">Nhân viên khác</option>
                                    @for($i = 1; $i <= 8; $i ++)
                                    <option value="{{$i}}" 
                                        @if($salary['level'] == $i) 
                                        selected 
                                        @endif
                                    >Bậc {{$i}}</option>
                                    <!--  -->
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-3">Hệ Số Lương </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control wage-child" name="coefficient" id="coefficient" value="{{$salary['coefficient']}}">
                                <!--  -->
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End right side WAGE -->

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
                        <a href="{{route('listUser')}}">
                            <button type="button" class="btn btn-default" >
                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                        </button>
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
<script src="{!!url('global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function()
        {
            $('#reportAdd').fadeOut();
        },4000);

        $('#basicWage').number( true, 0 );

        $('#level').on('change', function () {
            level = $(this).val();
            if( level == 0) {
                $('#coefficient').val('1');
            }
            else {
                for(i = 1; i <= 8; i++) {
                    if(level == i) coefficient = 4.4 + 0.34 * (i - 1);
                }
                coefficient = Math.round(coefficient * 100) / 100;
                $('#coefficient').val(coefficient);
            }
        });

        //disable all input WAGE
        if($('.wage-disable').length > 0 ) {
            $('.wage-child').attr('disabled',"");
        }
    })
</script>