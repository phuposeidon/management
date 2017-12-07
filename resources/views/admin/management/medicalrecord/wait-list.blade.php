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
        <h1 class="page-title"> KHÁM BỆNH</h1>
        <div class="portlet light bordered" style="height: 100%;">
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
                                                            <th>Chi tiết</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- ngRepeat: item in BSGD.TCBT -->
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
                                                    <input type="number"  name="weight" class="form-control" placeholder="Cân Nặng (kg)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Chiều Cao</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="height" class="form-control" placeholder="Chiều Cao (cm)">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">BMI</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="price" class="form-control" placeholder="  ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nhóm Máu</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" >
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                    </select>
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

                                        <div class="form-group" style="margin-bottom: 10px;">
                                            <label class="col-md-4 control-label">Lý do tới khám</label>
                                            <div class="col-md-6">
                                                <input type="text" id="reason" class="form-control" placeholder="Lý do tới khám">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Mẫu Bệnh Án</label>
                                            <div class="col-md-6" style="margin-top: 10px;">
                                                <select class="form-control" >
                                                    <option value="A">Bệnh Án Tai Mũi Họng</option>
                                                    <option value="B">B</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END INFO LEFT -->
                                    <div class="col-md-6">
                                        <div class="form-body">

                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <label class="col-md-4 control-label">Chuẩn Đoán</label>
                                                <div class="col-md-6">
                                                    <input type="text" required id="diagnosis"  class="form-control" placeholder="Chuẩn Đoán">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Tái Khám</label>
                                                <div class="col-md-6" style="margin-top: 10px;">
                                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input  id="meeting" type="text" class="form-control">
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
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <label>Khám Bệnh</label>
                                        <textarea cols="80" id="editor1" rows="10">
                                            <p>
                                                1 TAI: * Trái :-ống tai sạch , màng nhĩ căng bóng , không thủng * Phải: ống tai sạch thoáng màng nhĩ không thủng .
                                            </p>
                                            <p>
                                                2 MŨI : * - phải: niêm mạc hồng ,vác ngăn thẳng ,hốc mũi sạch không phù nề , khe giữa không tụ dịch , không polyp * Trái
                                                : giống trên
                                            </p>
                                            <p>
                                                3- VÒM HỌNG: niêm mạc viêm tụ dịch, không U . Gờ vòi tai thoáng
                                            </p>
                                            <p>
                                                4-HỌNG: - Niêm mạc lưỡi sạch không dơ, -Amidan viêm hốc mủ mạn tính quá phát 2 bên -Hạ họng đáy lưỡi tăng sản mô lim phô
                                                cuống lưỡi 2 bên -Dây thanh căng bóng không hạt xơ , không polyp
                                            </p>
                                            <p>
                                                5-KẾT LUẬN : -Viêm amidan mạn tính, viêm mô vòm , viêm hạ họng đáy lưỡi, GERD
                                            </p>
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
                                        <div class="col-md-4">
                                            <select id="choose_medicine" class="form-control" name="">
                                                <option>Chọn</option>
                                                @foreach($medicines as $medicine)
                                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                @endforeach
                                            </select>
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
<!--                                             <tr ng-repeat="item in selectedMeds" class="ng-scope">
                                                <td width="3%"  >1</td>
                                                <td width="15%"  >
                                                    Aceclofenac
                                                </td>
                                                <td width="8%">
                                                    <span  >Viên</span>
                                                </td>
                                                <td width="8%">
                                                    <span  >Viên</span>

                                                </td>


                                                <td width="3%">
                                                    <span  >1</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >0</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >1</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >0</span>

                                                </td>


                                                <td width="5%">
                                                    <span  >1</span>
                                                </td>


                                                <td width="10%">
                                                    <span  >1</span>

                                                </td>
                                                <td width="15%">
                                                    <span  ></span>

                                                </td>
                                                <td width="15%">
                                                    <span  ></span>

                                                </td>
                                                <td ng-if="!isDiagnosisHistoryForm" width="5%" class="ng-scope">
                                                    <button type="button" class="btn btn-xs btn-danger" id="add_medicine">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr> -->
                                            <!-- end ngRepeat: item in selectedMeds -->

                                        </tbody>
                                    </table>
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

                        </div>

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
                        <div class="form form-horizontal">
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
                        </div>
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
        <div class="modal fade draggable-modal" data-id="" id="fami_medical" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Thêm Tiền Căn Gia Đình</h4>
                        <div id="test"></div>
                    </div>
                    <div class="modal-body">
                        <div class="form form-horizontal">
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
                                        <textarea id="note" value="" rows="5" class="form-control" style=""></textarea>
                                    </div>
                                </div>

                                <!-- ngIf: isFMP -->
                            </fieldset>
                        </div>
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
                                         @if(isset($medicine_history) )
                                        <tbody id="render_medicine">
                                            @foreach($medicine_history as $key => $doc)
                                            <tr ng-repeat="item in selectedMeds" class="ng-scope">
                                                <td width="15%"  >
                                                   {{$b[$key]['name']}}
                                                </td>
                                                <td width="8%">
                                                    <span  >Viên</span>
                                                </td>
                                                <td width="8%">
                                                    <span  >Viên</span>

                                                </td>


                                                <td width="3%">
                                                    <span  >{{$doc->morning}}</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >{{$doc->afternoon}}</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >{{$doc->evening}}</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >{{$doc->night}}</span>

                                                </td>


                                                <td width="5%">
                                                    <span  >{{$doc->amount}}</span>
                                                </td>

                                                <td width="15%">
                                                    <span  >{{$doc->using_med}}</span>

                                                </td>
                                                <td width="15%">
                                                    <span  >{{$doc->note}}</span>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        @endif
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
<script>
    $(document).ready(function(){
         $.ajaxSetup({
            headers: {      
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Patient Medical
         $('.add_patient_medical').on('click', function(event) {
             event.preventDefault();
             var id = $(this).data('id');
             $('#save_patient').click(function(event) {
                 var base_name = $('#base_name').val();
                    var base_note = $('#base_note').val();
                 $.post('patient-medical', {id: id,name:base_name,note:base_note}, function(data) {
                        $('#table_body').html(data);
                        $('#patient_medical').modal('toggle');
                 });
             });
         });
         //====================================
         //Fami Medical
         $('.add_fami_medical').on('click', function(event) {
             event.preventDefault();
             var id = $(this).data('id');
             $('#fami_medical_2').click(function(event) {
                 var relationship = $('#relationship').val();
                 var disease = $('#disease').val();
                 var note = $('#note').val();
                 var socialproblem = $('#socialproblem').val();
                 $.post('fami-medical', {id:id, relationship:relationship, disease:disease , note:note , socialproblem:socialproblem }, function(data) {
                        $('#fami_body').html(data);
                        $('#fami_medical').modal('toggle');

                     
                 });
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
            var diagnosis = $('#diagnosis').val();
            var ckeditor = $( 'textarea#editor1' ).val();
            var meeting = $('#meeting').val();
            var dataSource = {
                    diagnosis: diagnosis,
                    ckeditor:ckeditor,
                    id:{{$id}},
                    meeting:meeting
                };

            $.post('medicalrecord', dataSource, function(data) {
                var a = data.success;
                console.log(a);
                if(data.success=200)
                {
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
            
        $('#add_medicine').on('click',function(event) {
            var name = $("#medicine").val();
            alert(name);
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
            var price = {{$medicine->price}};

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
                price:price
            };
            console.log(dataSource);
            $.post('order-medicine', dataSource, function(data, textStatus, xhr) {
                $('#render_medicine').html(data);
            });

        });

    });
</script>
 