@extends('admin.layouts.master') @section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height:900px">
        <!-- BEGIN TAB PORTLET-->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Trang chủ</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Danh Sách Chờ</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Lịch Sử Khám</span>
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
        <div id="medicalRecord" style="display:none;" class="alert alert-success">
            Lưu thành công
        </div>

        @if (session('status'))
        <div id="status" class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <h1 class="page-title"> Lịch Sử Khám Bệnh</h1>
        <div class="portlet light bordered" style="height: 100%;">
            <div class="portlet-title tabbable-line">

                <ul class="nav nav-tabs" style="float:none;">
                    <li class="active">

                        <a href="#portlet_tab1" data-toggle="tab"> Thông Tin Bệnh Nhân </a>
                    </li>
                    <li id="index">
                        <a href="#portlet_tab2" id="hrefa" data-toggle="tab"> Chỉ Số Sinh Hiệu </a>
                    </li>
                    <li>
                        <a href="#portlet_tab3" data-toggle="tab"> Khám Bệnh </a>
                    </li>
                    <li>
                        <a href="#portlet_tab4" data-toggle="tab"> Toa Thuốc </a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div id="load-content" class="tab-content">
                    <div class="tab-pane active" id="portlet_tab1">
                        <!--  Thông tin benh nhan -->
                        <div class="portlet light bordered" style="height: 80%;">
                            <div class="portlet-title tabbable-line">

                                <ul class="nav nav-tabs" style="float:none;">
                                    <li class="active">
                                        <a href="#patient_1" data-toggle="tab"> Dị Ứng </a>
                                    </li>
                                    <li>
                                        <a href="#patient_2" data-toggle="tab"> Tiền Căn Bản Thân </a>
                                    </li>
                                    <li>
                                        <a href="#patient_3" data-toggle="tab"> Tiền Căn Gia Đình </a>
                                    </li>
                                    <li>
                                        <a href="#patient_4" data-toggle="tab"> Thông Tin Cá Nhân </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="patient_1">
                                        <form class="form-horizontal" action="{{route('postAllergic',['id'=>$id])}}" method="POST" role="form">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="form-group">
                                                        <label class="col-md-offset-2 col-md-2 control-label">Dị ứng thuốc</label>
                                                        <div class="col-md-6">
                                                            <input type="text" value="{{$allergic}}" name="allergic" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-offset-2 col-md-2 control-label">Dị ứng khác</label>
                                                        <div class="col-md-6">
                                                            <input type="text" value="{{$diff_allergic}}" name="diff_allergic" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="patient_2">
                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <table style="text-align:center;" class="table table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="50">STT</th>
                                                        <th>Tiền Căn</th>
                                                        <th>Ghi chú</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body">
                                                    @foreach($patient_medicals as $patient_medical)
                                                    <tr>
                                                        <td>{{$patient_medical->id}}</td>
                                                        <td>{{$patient_medical->disease}}</td>
                                                        <td>{{$patient_medical->note}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="tab-pane" id="patient_3">
                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="50">STT</th>
                                                            <th width="150">Tên Quan Hệ</th>
                                                            <th>Tên Bệnh</th>
                                                            <th>Vấn đề XH</th>
                                                            <th>Ghi chú</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="fami_body">
                                                        @foreach($fami_medicals as $fami)
                                                        <tr>
                                                            <td></td>
                                                            <td>{{$fami->relationship}}</td>
                                                            <td>{{$fami->disease}}</td>
                                                            <td>{{$fami->socialproblem}}</td>
                                                            <td>{{$fami->note}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="patient_4">

                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <form class="form-horizontal">

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
                                                                <input type="text" value="@if($patient['DOB']) {{Carbon\Carbon::Parse($patient['DOB'])->format('d-m-Y')}} @endif" name="birthday"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Giới Tính</label>
                                                            <div class="col-md-6">
                                                                <select name="gender" class="form-control">
                                                                    <option value="1" @if($patient->gender == 1) selected @endif>Nam
                                                                    </option>
                                                                    <option value="0" @if($patient->gender == 0) selected @endif>Nữ
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">CMND</label>
                                                            <div class="col-md-6">
                                                                <input type="number" value="{{$patient['passport']}}" name="passport" class="form-control" placeholder="  ">
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
                                                                    <textarea name="address" class="form-control" rows="5">{{$patient['address']}}</textarea>

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Nhóm Máu</label>
                                                                <div class="col-md-6">
                                                                    <select class="form-control" name="bloodgroup">
                                                                        <option value="" @if($patient[ 'bloodgroup']=="" ) selected @endif>Chưa biết</option>
                                                                        <option value="A" @if($patient[ 'bloodgroup']=="A" ) selected @endif>A</option>
                                                                        <option value="B" @if($patient[ 'bloodgroup']=="B" ) selected @endif>B</option>
                                                                        <option value="O" @if($patient[ 'bloodgroup']=="O" ) selected @endif>O</option>
                                                                        <option value="AB" @if($patient[ 'bloodgroup']=="AB" ) selected @endif>AB</option>
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
                                                                            <input name="active" value="1" @if($patient->active==1) checked @endif type="checkbox">Hoạt
                                                                            Động
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                </div>

                                                </form>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Bệnh Nhân</th>
                                                                <th>Giới Tính</th>
                                                                <th>Số Điện Thoại</th>
                                                                <th>Ghi chú</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{$patient->fullname}}</td>
                                                                <td>
                                                                    @if($patient->gender == 1) Nam @else Nữ @endif
                                                                </td>
                                                                <td>
                                                                    {{$patient->phone}}
                                                                </td>
                                                                <td>{{$patient['note']}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                    <div class="tab-pane" id="portlet_tab2">
                        <form class="form-horizontal" action="{{route('general')}}" method="POST" role="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Mạch</label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$general->cell}} " class="form-control" placeholder="Mạch">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nhiệt Độ</label>
                                                <div class="col-md-6">
                                                    <input type="number" value="{{$general['temperature']}}" required name="temperature" class="form-control" placeholder="Nhiệt Độ (C)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Huyết Áp</label>
                                                <div class="col-md-6">
                                                    <input type="number" required name="  bloodpressure" value="{{$general['bloodpressure']}}" class="form-control" placeholder="Huyết Áp (mmHg)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Vòng eo</label>
                                                <div class="col-md-6">
                                                    <input type="number" value="{{$general['waist']}}" name="waist" class="form-control" placeholder="Vòng eo (cm)">
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <!-- END INFO LEFT -->
                                    <div class="col-md-6">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Đường huyết</label>
                                                <div class="col-md-6">
                                                    <input type="number" value="{{$general['bloodsugar']}}" name="bloodsugar" class="form-control" placeholder="Đường Huyết (mg/dl)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Cân Nặng</label>
                                                <div class="col-md-6">
                                                    <input type="number" value="{{$general['weight']}}" name="weight" class="form-control" placeholder="Cân Nặng (kg)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Chiều Cao</label>
                                                <div class="col-md-6">
                                                    <input type="number" value="{{$general['height']}}" name="height" class="form-control" placeholder="Chiều Cao (cm)">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">BMI</label>
                                                <div class="col-md-6">
                                                    <input type="number" value="{{$general['bmi']}}" class="form-control" placeholder="  ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nhóm Máu</label>
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-top:30px;">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh
                                        </button>
                                        <a href="{{route('list')}}" class="btn btn-default">
                                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </form>
                    </div>

                    <div class="tab-pane" id="portlet_tab3">

                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group" style="margin-bottom: 10px;">
                                            <label class="col-md-4 control-label">Chẩn Đoán</label>
                                            <div class="col-md-6">

                                                <input type="text" value="{{$record['diagnosis']}}" required id="diagnosis" class="form-control" placeholder="Chuẩn Đoán">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END INFO LEFT -->
                                    <div class="col-md-6">
                                        <div class="form-body">



                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Tái Khám</label>
                                                <div class="col-md-6" style="margin-top: 10px;">
                                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        <input id="meeting" value="{{Carbon\Carbon::Parse($record['appoimentDate'])->format('d-m-Y')}}" type="text" class="form-control">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <label>Khám Bệnh</label>
                                        <textarea cols="80" id="editor1" rows="10">
                                            {{htmlspecialchars($record['conclusion'])}}
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                </div>
                            </div>
                        
@endsection

<script src="{!!url('global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
<script src="{!!url('ckeditor/ckeditor.js')!!}"></script>