@extends('admin.layouts.master') @section('content')
<!-- BEGIN CONTENT -->
<script>
function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" >
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
                    <span>Khám Bệnh</span>
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
        <h1 class="page-title"> KHÁM BỆNH </h1>
        

        @if (session('cdha'))
        <div id="notifi_cdha" class="alert alert-success">
            {{ session('cdha') }}
            </div>
        @endif
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">

                <ul class="nav nav-tabs" style="float:none;">
                    <li  class="active">

                        <a href="#portlet_tab1" data-toggle="tab"> Thông Tin Bệnh Nhân </a>
                    </li>
                    <li id="index"> <a href="#portlet_tab2" id="hrefa" data-toggle="tab"> Chỉ Số Sinh Hiệu </a>
                    </li>
                    <li>
                        <a href="#portlet_tab3" data-toggle="tab"> Khám Bệnh </a>
                    </li>
                    <li>
                        <a href="#portlet_tab4" data-toggle="tab"> Toa Thuốc </a>
                    </li>

                    <li>
                        <a href="#portlet_tab5" data-toggle="tab"> CĐHA </a>
                    </li>

                </ul>
            </div>
            <div class="portlet-body">
                <div id="load-content" class="tab-content">
                    <div class="tab-pane active" id="portlet_tab1">
                        <!--  Thông tin benh nhan -->
                        <div class="portlet light bordered" style="height: 100%;">
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
                                            <div class="row">
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
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="patient_2">
                                        <div class="btn-group">
                                            <a data-toggle="modal" class="btn sbold green add_patient_medical" data-id="{{$id}}" href="#patient_medical">
                                                    <i class="fa fa-plus"></i>
                                                    Thêm
                                            </a>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <table style="text-align:center;" class="table table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="50">STT</th>
                                                        <th>Tiền Căn</th>
                                                        <th  >Ghi chú</th>
                                                        <th>Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body">
                                                    @foreach($patient_medicals as $patient_medical)
                                                        <tr>
                                                            <td>{{$patient_medical->id}}</td>
                                                            <td>{{$patient_medical->disease}}</td>
                                                            <td>{{$patient_medical->note}}</td>
                                                            <td>
                                                                <div>
                                                                    <a href="" class="btn btn-xs red dropdown-toggle delete" data-id=""> Xóa</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="tab-pane" id="patient_3">
                                        <div class="btn-group">
                                            <a data-toggle="modal" class="btn sbold green add_fami_medical" data-id="{{$id}}" href="#fami_medical">
                                                Thêm
                                                    <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="50"  >STT</th>
                                                            <th width="150"  >Tên Quan Hệ</th>
                                                            <th  >Tên Bệnh</th>
                                                            <th  >Vấn đề XH</th>
                                                            <th  >Ghi chú</th>

                                                            <th width="50"  >Xóa</th>
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
                                                            <td>
                                                                <div>
                                                                    <a href="" class="btn btn-xs red dropdown-toggle delete" data-id=""> Xóa</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="patient_4">

                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th >STT</th>
                                                            <th >Bệnh Nhân</th>
                                                            <th >Giới Tính</th>
                                                            <th  >Số Điện Thoại</th>
                                                            <th  >Ghi chú</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{$patient->fullname}}</td>
                                                            <td>
                                                                @if($patient->gender == 1)
                                                                Nam
                                                                @else
                                                                    Nữ
                                                                @endif
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
                                                    <input type="number" required name="cell" class="form-control" placeholder="Mạch">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nhiệt Độ</label>
                                                <div class="col-md-6">
                                                    <input type="number" required name="temperature" class="form-control" placeholder="Nhiệt Độ (C)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Huyết Áp</label>
                                                <div class="col-md-6">
                                                    <input type="number" required name="  bloodpressure" class="form-control" placeholder="Huyết Áp (mmHg)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Vòng eo</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="waist" class="form-control" placeholder="Vòng eo (cm)">
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
                                                    <input type="number"  name="bloodsugar" class="form-control" placeholder="Đường Huyết (mg/dl)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Cân Nặng</label>
                                                <div class="col-md-6">
                                                    <input type="number" id="weight"  name="weight" class="form-control" placeholder="Cân Nặng (kg)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Chiều Cao</label>
                                                <div class="col-md-6">
                                                    <input type="number" id="height" name="height" class="form-control" placeholder="Chiều Cao (cm)">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">BMI</label>
                                                <div class="col-md-6">
                                                    <input type="number" id="bmi" name="bmi" class="form-control" placeholder="  ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="portlet_tab3">

                        <div class="form-horizontal"  >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                       <div class="form-group">
                                            <label class="col-md-4 control-label">Chọn Dịch Vụ</label>
                                            <div class="col-md-6" style="margin-top: 10px;">
                                                <select id="chose_service" class="form-control" >
                                                    <option value="Chọn">Chọn DV</option>
                                                    @foreach($services as $service)
                                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Mẫu Bệnh Án</label>
                                            <div class="col-md-6" style="margin-top: 10px;">
                                                <select id="mau_benh_an" class="form-control" >
                                                    <option value="">Chọn mẫu</option>
                                                    @foreach($records as $record)
                                                    <option value="{{$record->id}}">{{$record->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END INFO LEFT -->
                                    <input type="hidden" id="doctorId" value="{{Auth::user()->id}}">
                                    <div class="col-md-6">
                                        <div class="form-body">

                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <label class="col-md-4 control-label">Chẩn Đoán</label>
                                                <div class="col-md-6">
                                                    <input type="text" required id="diagnosis"  class="form-control" placeholder="Chẩn Đoán">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Tái Khám</label>
                                                <div class="col-md-6" style="margin-top: 10px;">
                                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        <input  id="meeting" type="text" class="form-control">
                                                        
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
                                        <textarea cols="100" id="editor1" rows="20">
                                           
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-top:30px;">
                                        <button id="save_diagnosis" class="btn btn-primary">
                                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                                        </button>
                                        <a href="{{route('history',['id'=>$id])}}" type="button" class="btn btn-default">
                                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Xem Lịch Sử Khám
                                        </a>
                                        <a href="{{route('list')}}" class="btn btn-default">
                                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="portlet_tab4">
                        <div class="form-horizontal">
                            <div>
                                <a class="btn green btn-outline sbold" data-toggle="modal" href="#large"> Toa Thuốc Cũ</a>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Chọn thuốc</label>
                                        <div class="col-md-4 ui-widget">
                                            <input id="cities" type="search" class="form-control" >
                                            <input type="text" hidden="" id="price" name="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row" style="margin-top: 30px;">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Thuốc</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="medicine" name="name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Liều Dùng</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="amount" name="name" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- END INFO LEFT -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label ng-binding">Sáng</label>
                                            <div class="col-sm-3">
                                                <input type="number" id="morning" value="0"  class="form-control" style="">
                                            </div>
                                            <label class="col-sm-3 control-label ng-binding">Trưa</label>
                                            <div class="col-sm-3">
                                                <input type="number" id="afternoon" value="0"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label ng-binding">Chiều</label>
                                            <div class="col-sm-3">
                                                <input type="number" id="evening" value="0" class="form-control" 
                                                    style="">
                                            </div>
                                            <label class="col-sm-3 control-label ng-binding">Tối</label>
                                            <div class="col-sm-3">
                                                <input type="number" id="night" value="0" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label ng-binding">Số Ngày</label>
                                            <div class="col-sm-3">
                                                <input type="number" id="expireDay" value="0"  class="form-control" style="">
                                            </div>
                                            <label class="col-sm-3 control-label ng-binding">Tổng</label>
                                            <div class="col-sm-3">
                                                <input type="number" value="0" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Cách Dùng</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="using_med" required name="name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ghi Chú</label>
                                                <div class="col-md-8">
                                                    <textarea rows="2" id="note" type="text" class="form-control" style=""></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-offset-3 col-md-8">
                                                    <button id="add_medicine" class="btn btn-primary">Thêm thuốc</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="orderId" name="">
                            <div class="form-group" style="margin-top: 50px;">
                                <input type="hidden" id="getId" name="">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-condensed" style="width:1200px">
                                        <thead>
                                            <tr>
                                                <th width="15%"  >Tên thuốc
                                                    <br>Dược chất chính</th>
                                                <th width="8%"  >Đơn vị</th>
                                                <th width="8%"  >Đơn vị dùng</th>
                                                <th width="3%"  >Sáng</th>
                                                <th width="3%"  >Trưa</th>
                                                <th width="3%"  >Chiều</th>
                                                <th width="3%"  >Tối</th>
                                                <th width="5%"  >Số ngày</th>
                                                <th width="15%"  >Cách dùng thuốc</th>
                                                <th width="15%"  >Ghi chú</th>
                                                <!-- ngIf: !isDiagnosisHistoryForm -->
                                                <th ng-if="!isDiagnosisHistoryForm" width="5%" class="ng-binding ng-scope">Xóa</th>
                                                <!-- end ngIf: !isDiagnosisHistoryForm -->

                                            </tr>
                                        </thead>
                                        <tbody id="render_medicine">

                                            <!-- ngRepeat: item in selectedMeds -->


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane" id="portlet_tab5">

                        <form action="{{route('upload_image')}}" method="POST" enctype="multipart/form-data" class="form-horizontal"  >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                        <div class="form-group" style="margin-bottom: 10px;">
                                            <label class="col-md-4 control-label">Tên bệnh nhân</label>
                                            <div class="col-md-6">
                                                <input type="text" disabled="" value="{{$patient->fullname}}" name="patientName"  class="form-control" placeholder="Chuẩn Đoán">
                                                <input type="hidden" value="{{$id}}" name="patient_id">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Chọn dịch vụ CĐHA</label>
                                            <div class="col-md-6" style="margin-top: 10px;">
                                                <select id="mau_cdha" name="mau_cdha_id" class="form-control" >
                                                    <option value="A">Chọn mẫu</option>
                                                    @foreach($service_cdha as $cdha)
                                                    <option value="{{$cdha->id}}">{{$cdha->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END INFO LEFT -->
                                    <div class="col-md-6">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Giới Tính</label>
                                                <div class="col-md-6">
                                                    <select disabled="" name="gender" class="form-control">
                                                        <option value="1" @if($patient->gender == 1)
                                                        selected 
                                                    @endif>Nam</option>
                                                        <option value="0" @if($patient->gender == 0)
                                                        selected 
                                                    @endif>Nữ</option>
                                                    </select>
                                                </div>
                                            </div>

                                           <div class="form-group" style="margin-bottom: 10px;">
                                                <label class="col-md-3 control-label">Ngày sinh</label>
                                                <div class="col-md-6">
                                                     <input disabled="" type="text" value="@if($patient['DOB']) {{Carbon\Carbon::Parse($patient['DOB'])->format('d-m-Y')}} @endif" name="birthday" class="form-control" >
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <label>Nội dung</label>
                                        <textarea cols="100" name="content" id="editor2" rows="20">
                                           
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('editor2');
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                      <div class="col-md-6">
                                          <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
                                      </div>
                                      <!-- <div class="col-md-6">
                                          <input type="submit" class="btn btn-primary" name='submit_image' value="Upload Multiple Image"/>
                                      </div> -->
                             </div>
                             <div class="row" id="image_preview"></div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-top:30px;">
                                        <button id="save_diagnosis" class="btn btn-primary">
                                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                                        </button>
                                        <a href="{{route('history',['id'=>$id])}}" type="button" class="btn btn-default">
                                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Xem Lịch Sử Khám
                                        </a>
                                        <a href="{{route('list')}}" class="btn btn-default">
                                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <!-- END TAB PORTLET-->

        <div class="modal fade draggable-modal" data-id="{{$id}}" id="patient_medical" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Thêm Tiền Căn Bản Thân</h4>
                        <div id="test"></div>
                    </div>
                    <div class="modal-body">
                        <form id="reset_patientmedical" class="form form-horizontal">
                            <fieldset>
                                <div class="form-group">

                                    <label class="control-label col-sm-3 ng-binding">Tiền Căn </label>

                                    <div class="col-sm-8">
                                        <input type="text" id="base_name" class="form-control " required="">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="control-label col-sm-3 ng-binding">Ghi Chú </label>

                                    <div class="col-sm-8">
                                        <textarea name="note" id="base_note" value="" rows="5" class="form-control" style=""></textarea>
                                    </div>
                                </div>

                                <!-- ngIf: isFMP -->
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_patient" class="btn green">Lưu</button>
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{--  END Tiền căn bản thân  --}}
        <div class="modal fade draggable-modal" data-id="{{$id}}" id="fami_medical" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Thêm Tiền Căn Gia Đình</h4>
                        <div id="test"></div>
                    </div>
                    <div class="modal-body">
                        <form class="form form-horizontal" id="reset_famimedical">
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 ng-binding">Tên Quan Hệ </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="relationship" class="form-control " required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3 ng-binding">Tên Bệnh </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="disease" class="form-control " required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3 ng-binding">Vấn Đề XH </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="socialproblem" class="form-control " required="">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="control-label col-sm-3 ng-binding">Ghi Chú </label>

                                    <div class="col-sm-8">
                                        <textarea id="note_fami" value="" rows="5" class="form-control" style=""></textarea>
                                    </div>
                                </div>

                                <!-- ngIf: isFMP -->
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="fami_medical_2" class="btn green">Lưu</button>
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

                <!-- /.modal -->
        <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Toa Thuốc Cũ</h4>
                    </div>
                    <div class="modal-body"> 
                         <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-4">
                                            <select id="choose_ordermedicine" class="form-control" name="">
                                                <option>Chọn</option>
                                                @foreach($orders as $order)
                                                <option value="{{$order->id}}">Toa {{$order->orderCode}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group" style="margin-top: 50px;">
                                <input type="hidden" id="getId" name="">
                                <div class="table-responsive">
                                  
                                    <table class="table table-bordered table-striped table-condensed" style="width:1200px">
                                        <thead>
                                           
                                            <tr>
                                                <th width="15%"  >Tên thuốc
                                                    <br>Dược chất chính</th>
                                                <th width="8%"  >Đơn vị</th>
                                                <th width="8%"  >Đơn vị dùng</th>
                                                <th width="3%"  >Sáng</th>
                                                <th width="3%"  >Trưa</th>
                                                <th width="3%"  >Chiều</th>
                                                <th width="3%"  >Tối</th>
                                                <th width="5%"  >Số ngày</th>
                                                <th width="15%"  >Cách dùng thuốc</th>
                                                <th width="15%"  >Ghi chú</th>
                                                <!-- ngIf: !isDiagnosisHistoryForm -->
                                               
                                                <!-- end ngIf: !isDiagnosisHistoryForm -->

                                            </tr>
                                        </thead>
                                        <tbody id="history_medicine">
                                          
                                        </tbody>

                                    </table>
                                    
                                </div>
                            </div>
                            </div>
                        </div>
                     </div>
                   <!--  <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green">Save changes</button>
                    </div> -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</div>
<!-- END CONTENT -->

@endsection



<script src="{!!url('global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
<script src="{!!url('ckeditor/ckeditor.js')!!}"></script>
<script type="text/javascript">
     $('#add_more').click(function() {
          "use strict";
          $(this).before($("<div/>", {
            id: 'filediv'
          }).fadeIn('slow').append(
            $("<input/>", {
              name: 'file[]',
              type: 'file',
              id: 'file',
              multiple: 'multiple',
              accept: 'image/*'
            })
          ));
        });

        $('#upload').click(function(e) {
          "use strict";
          e.preventDefault();

          if (window.filesToUpload.length === 0 || typeof window.filesToUpload === "undefined") {
            alert("No files are selected.");
            return false;
          }

          // Now, upload the files below...
          // https://developer.mozilla.org/en-US/docs/Using_files_from_web_applications#Handling_the_upload_process_for_a_file.2C_asynchronously
        });

        deletePreview = function (ele, i) {
          "use strict";
          try {
            $(ele).parent().remove();
            window.filesToUpload.splice(i, 1);
          } catch (e) {
            console.log(e.message);
          }
        }

        $("#file").on('change', function() {
          "use strict";

          // create an empty array for the files to reside.
          window.filesToUpload = [];

          if (this.files.length >= 1) {
            $("[id^=previewImg]").remove();
            $.each(this.files, function(i, img) {
              var reader = new FileReader(),
                newElement = $("<div id='previewImg" + i + "' class='previewBox'><img /></div>"),
                deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>X</span>").prependTo(newElement),
                preview = newElement.find("img");

              reader.onloadend = function() {
                preview.attr("src", reader.result);
                preview.attr("alt", img.name);
              };

              try {
                window.filesToUpload.push(document.getElementById("file").files[i]);
              } catch (e) {
                console.log(e.message);
              }

              if (img) {
                reader.readAsDataURL(img);
              } else {
                preview.src = "";
              }

              newElement.appendTo("#filediv");
            });
          }
        });
</script>
<script>
    $(document).ready(function(){
         $.ajaxSetup({
            headers: {      
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         //Tính BMI generalIndex
         
         $('#height, #weight').on('keyup', function(event) {
             event.preventDefault();
             var height = ($('#height').val())/100;
                var weight = $('#weight').val();
             /* Act on the event */
             var bmi = weight/(height*height);
             $('#bmi').val(Math.round(bmi));
         });
         
         //Mẫu bệnh Án
         $('#mau_benh_an').on('change', function(event) {
             event.preventDefault();
             var id = $('#mau_benh_an').val();
             $.get('/management/public/medical-record/'+id, function(data) {
                 // $( 'textarea#editor1' ).html(data);
                 CKEDITOR.instances.editor1.insertHtml(data);
             });
             
         });




        //Patient Medical
        $('#save_patient').on('click',function(event) {
                 var id = $('#patient_medical').data('id');
                 var base_name = $('#base_name').val();
                    var base_note = $('#base_note').val();
                 $.post('patient-medical', {id: id,name:base_name,note:base_note}, function(data) {
                       if(data)
                       {
                         $('#table_body').html(data);
                        $('#reset_patientmedical').trigger("reset");
                        $('#patient_medical').modal('hide');
                    }else{
                        alert('something went wrong');
                    }
                 });
             });
         //====================================
         //Fami Medical
       
             $('#fami_medical_2').click(function(event) {
                 var relationship = $('#relationship').val();
                 var disease = $('#disease').val();
                 var note = $('textarea#note_fami').val();
                  var id = $('#fami_medical').data('id');

                 var socialproblem = $('#socialproblem').val();
                 $.post('fami-medical', {id:id, relationship:relationship, disease:disease , note:note , socialproblem:socialproblem }, function(data) {
                        $('#fami_body').html(data);
                        $('#reset_famimedical')[0].reset();
                        $('#fami_medical').modal('toggle');
                        

                     
                 });
             }); 
         //End
         $('#status').hide(3000,function(){
            $(this).remove();
         });

         
        
        
    })
</script>

<script type="text/javascript">
     $(document).ready(function(){
        $.ajaxSetup({
            headers: {      
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Khám Bệnh
       
       
        $('#save_diagnosis').click(function(){
            var doctorId = $('#doctorId').val();
            var diagnosis = $('#diagnosis').val();
            var ckeditor = CKEDITOR.instances.editor1.getData();
            var meeting = $('#meeting').val();
             var chose_service = $('#chose_service').val();
            var dataSource = {
                    diagnosis: diagnosis,
                    ckeditor:ckeditor,
                    doctorId:doctorId,
                    id:{{$id}},
                    meeting:meeting,
                    serviceId:chose_service
                };
           

            $.post('medicalrecord', dataSource, function(data) {
                var a = data.success;
                console.log(a);
                if(data.success=200)
                {   
                    $('#orderId').val(data.orderId);
                    $('#medicalRecord').css({
                        display: 'block'
                    });

                    $('#getId').val(data.orderId);


                    $('#medicalRecord').hide(5000,function(){
                        $(this).remove();
                    });
                }
            });
        });

     })
</script>
<script type="text/javascript">
    $(document).ready(function() {
         $.ajaxSetup({
            headers: {      
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#choose_medicine').on('change', function(event) {
            event.preventDefault();
            var txt = $("#choose_medicine option:selected").text();
            $("#medicine").val(txt);
            $("#medicine").attr({
                "data-id":$("#choose_medicine option:selected").val()
            });

            
        });
//Toa thuốc cũ
        $('#choose_ordermedicine').on('change', function(event) {
            event.preventDefault();
            var id = $("#choose_ordermedicine").val();
            $.get('order-medicine/'+id, function(data) {
                $('#history_medicine').html(data);
            });
            
        });
            
        $('#add_medicine').on('click',function(event) {
            var name = $("#medicine").val();
            var medicine = $("#medicine").attr('data-id');
            var id =$('#getId').val();
            var amount   = $("#amount").val();
            var morning  = $("#morning").val();
            var afternoon= $('#afternoon').val();
            var evening  = $('#evening').val();
            var night    = $('#night').val();
            var expireDay = $('#expireDay').val();
            var using_med = $('#using_med').val();
            var note     = $('#note').val();
            var price = $('#price').val();

            var dataSource = {
                id:id,
                name:name,
                medicine:medicine,
                amount:amount,
                morning:morning,
                afternoon:afternoon,
                evening:evening,
                night:night,
                expireDay:expireDay,
                using_med:using_med,
                note:note,
                price:price,
                orderId:$('#orderId').val()
            };
            console.log(dataSource);
            $.post('order-medicine', dataSource, function(data, textStatus, xhr) {
                $('#render_medicine').html(data);
            });

        });

        //CĐHA
        $('#mau_cdha').on('change', function(event) {
            event.preventDefault();
            var id = $("#mau_cdha").val();
            $.get('cdha/'+id, function(data) {
                CKEDITOR.instances.editor2.insertHtml(data);
            });
            
        });


        if($('#notifi_cdha').text())
        {
            setTimeout(function() {
                $('#notifi_cdha').attr({
                    hidden: ''
                });
            }, 3000);
        }


        $( "#cities" ).autocomplete({
            source: '{{route("autocomplete")}}',
            select: function (event, ui) {
                    $("#cities").val(ui.item.value);
                    $("#medicine").val(ui.item.value);
                    $("#medicine").attr({
                        "data-id":ui.item.id
                    }); // display the selected text
                    $('#price').val(ui.item.price);
                }
            });

    });
</script>
 