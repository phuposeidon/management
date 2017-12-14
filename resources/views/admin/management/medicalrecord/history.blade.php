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
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="patient_2">
                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <table style="text-align:center;" class="table table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="50">STT</th>
                                                        <th>Tiền Căn</th>
                                                        <th  >Ghi chú</th>
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
                                                            <th width="50"  >STT</th>
                                                            <th width="150"  >Tên Quan Hệ</th>
                                                            <th  >Tên Bệnh</th>
                                                            <th  >Vấn đề XH</th>
                                                            <th  >Ghi chú</th>
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
                                                    <input type="number" value="{{$general['cell']}} " required name="cell" class="form-control" placeholder="Mạch">
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
                                                    <input type="number" value="{{$general['bloodsugar']}}"  name="bloodsugar" class="form-control" placeholder="Đường Huyết (mg/dl)">
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
                                                    <input type="text" value="{{$record['diagnosis']}}" required id="diagnosis"  class="form-control" placeholder="Chuẩn Đoán">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Tái Khám</label>
                                                <div class="col-md-6" style="margin-top: 10px;">
                                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input  id="meeting" value="{{$record['appoimentDate']}}" type="text" class="form-control">
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
<!-- 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-top:30px;">
                                        <button id="save_diagnosis" class="btn btn-primary">
                                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                                        </button>
                                        <button type="button" class="btn btn-default">
                                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Xem Lịch Sử Khám
                                        </button>
                                        <a href="{{route('list')}}" class="btn btn-default">
                                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="tab-pane" id="portlet_tab4">
                        <div class="form-horizontal">
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
                                                <th ng-if="!isDiagnosisHistoryForm" width="5%" class="ng-binding ng-scope">Xóa</th>
                                                <!-- end ngIf: !isDiagnosisHistoryForm -->

                                            </tr>
                                        </thead>
                                        <tbody id="render_medicine">

                                            <!-- ngRepeat: item in selectedMeds -->
                                           
                                            <!-- end ngRepeat: item in selectedMeds -->

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

