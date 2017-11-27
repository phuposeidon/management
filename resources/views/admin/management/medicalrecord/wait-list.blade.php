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
            <h1 class="page-title"> KHÁM BỆNH</h1>
        <div class="portlet light bordered" style="height: 100%;">
            <div class="portlet-title tabbable-line">

                <ul class="nav nav-tabs" style="float:none;">
                    <li class="active">
                        <a href="#portlet_tab1" data-toggle="tab"> Thông Tin Bệnh Nhân </a>
                    </li>
                    <li>
                        <a href="#portlet_tab2" data-toggle="tab"> Chỉ Số Sinh Hiệu </a>
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
                <div class="tab-content">
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-horizontal" action="{{route('addService')}}" method="POST" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-offset-2 col-md-2 control-label">Dị ứng thuốc</label>
                                                        <div class="col-md-6">
                                                            <input type="text" required name="name" class="form-control" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-offset-2 col-md-2 control-label">Dị ứng khác</label>
                                                        <div class="col-md-6">
                                                            <input type="text" required name="name" class="form-control" >
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-center" style="margin-top:30px;">
                                                    <button type="submit" class="btn btn-primary" >
                                                        <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                                                    </button>
                                                    <button type="button" class="btn btn-primary">
                                                        <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh 
                                                    </button>
                                                    <a href="{{route('list')}}" class="btn btn-default" >
                                                        <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="patient_2">
                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <table class="table table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="50" class="ng-binding">STT</th>
                                                        <th width="150" class="ng-binding">Tiền Căn</th>
                                                        <th class="ng-binding">Ghi chú</th>
                                                        <th width="50" class="ng-binding">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- ngRepeat: item in BSGD.TCBT -->
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
                                                            <th width="50" class="ng-binding">STT</th>
                                                            <th width="150" class="ng-binding">Tên Quan Hệ</th>
                                                            <th class="ng-binding">Tên Bệnh</th>
                                                            <th class="ng-binding">Vấn đề XH</th>
                                                            <th class="ng-binding">Ghi chú</th>

                                                            <th width="50" class="ng-binding">Xóa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- ngRepeat: item in BSGD.TCBT -->
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
                                                            <th width="50" class="ng-binding">STT</th>
                                                            <th width="150" class="ng-binding">Bệnh Nhân</th>
                                                            <th class="ng-binding">Giới Tính</th>
                                                            <th class="ng-binding">Số Điện Thoại</th>
                                                            <th class="ng-binding">Ghi chú</th>

                                                            <th width="50" class="ng-binding">Xóa</th>
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
                        <form class="form-horizontal" action="" method="POST" role="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Mạch</label>
                                                <div class="col-md-6">
                                                    <input type="text" required name="name" class="form-control" placeholder="Mạch">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nhiệt Độ</label>
                                                <div class="col-md-6">
                                                    <input type="text" required name="name" class="form-control" placeholder="Nhiệt Độ (C)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Huyết Áp</label>
                                                <div class="col-md-6">
                                                    <input type="text" required name="name" class="form-control" placeholder="Huyết Áp (mmHg)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Vòng eo</label>
                                                <div class="col-md-6">
                                                    <input type="text" required name="name" class="form-control" placeholder="Vòng eo (cm)">
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
                                                    <input type="number" required name="price" class="form-control" placeholder="Đường Huyết (mg/dl)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Cân Nặng</label>
                                                <div class="col-md-6">
                                                    <input type="text" required name="price" class="form-control" placeholder="Cân Nặng (kg)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Chiều Cao</label>
                                                <div class="col-md-6">
                                                    <input type="text" required name="price" class="form-control" placeholder="Chiều Cao (cm)">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">BMI</label>
                                                <div class="col-md-6">
                                                    <input type="number" required name="price" class="form-control" placeholder="  ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nhóm Máu</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="bloodgroup">
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
                                        <button type="submit" class="btn btn-primary" >
                                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh 
                                        </button>
                                        <a href="{{route('list')}}" class="btn btn-default" >
                                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                    </div>

                    <div class="tab-pane" id="portlet_tab3">

                        <form class="form-horizontal" action="" method="POST" role="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <label class="col-md-4 control-label">Lý do tới khám</label>
                                                <div class="col-md-6">
                                                    <input type="text" required name="name" class="form-control" placeholder="Lý do tới khám">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Mẫu Bệnh Án</label>
                                                <div class="col-md-6" style="margin-top: 10px;">
                                                    <select class="form-control" name="bloodgroup">
                                                        <option value="A">Bệnh Án Tai Mũi Họng</option>
                                                        <option value="B">B</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- END INFO LEFT -->
                                    <div class="col-md-6">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Chuẩn Đoán</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="bloodgroup">
                                                        <option value="A">A000 - bệnh tả do vibrio cholerae 01, typ sinh học cholerae</option>
                                                        <option value="B">B</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Tái Khám</label>
                                                <div class="col-md-6" style="margin-top: 10px;">
                                                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                                        <input name="todate" required type="text" class="form-control">
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
                                                 <textarea cols="80" id="editor1"  rows="10">
                                                     <p>
                                                         1 TAI: * Trái :-ống tai sạch , màng nhĩ căng bóng , không thủng * Phải: ống tai sạch thoáng màng nhĩ không thủng .
                                                     </p>
                                                      <p>
                                                          2 MŨI : * - phải: niêm mạc hồng ,vác ngăn thẳng ,hốc mũi sạch không phù nề , khe giữa không tụ dịch , không polyp * Trái : giống trên
                                                      </p>
                                                     <p>
                                                          3- VÒM HỌNG: niêm mạc viêm tụ dịch, không U . Gờ vòi tai thoáng 
                                                     </p>
                                                      <p>
                                                          4-HỌNG: - Niêm mạc lưỡi sạch không dơ, -Amidan viêm hốc mủ mạn tính quá phát 2 bên -Hạ họng đáy lưỡi tăng sản mô lim phô cuống lưỡi 2 bên -Dây thanh căng bóng không hạt xơ , không polyp 
                                                      </p>
                                                      <p>
                                                          5-KẾT LUẬN : -Viêm amidan mạn tính, viêm mô vòm , viêm hạ họng đáy lưỡi, GERD
                                                      </p>
                                                 </textarea>
                                                 <script>

                                                    CKEDITOR.replace( 'editor1' );

                                                </script>
                                         </div>
                                </div> 
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-top:30px;">
                                        <button type="submit" class="btn btn-primary" >
                                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh 
                                        </button>
                                        <a href="{{route('list')}}" class="btn btn-default" >
                                            <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="portlet_tab4">
                        <form class="form-horizontal" action="" method="POST" role="form">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Chọn thuốc</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="bloodgroup">
                                                    <option value="A">Aescin</option>
                                                    <option value="B">B</option>
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
                                                        <input type="text" required name="name" class="form-control" >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Liều Dùng</label>
                                                    <div class="col-md-8">
                                                        <input type="text" required name="name" class="form-control" >
                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>
                                        <!-- END INFO LEFT -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label ng-binding">Sáng</label>
                                                <div class="col-sm-3">
                                                    <input type="number" value="0" ng-change="changeQuality()" min="0" step="1" class="form-control"
                                                         style="">
                                                </div>
                                                <label class="col-sm-3 control-label ng-binding">Trưa</label>
                                                <div class="col-sm-3">
                                                    <input type="number" value="0" ng-change="changeQuality()" min="0" step="1" class="form-control"
                                                        >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label ng-binding">Chiều</label>
                                                <div class="col-sm-3">
                                                    <input type="number" value="0" ng-change="changeQuality()" min="0" step="1" class="form-control"
                                                        ng-model="Medicine.morning" style="">
                                                </div>
                                                <label class="col-sm-3 control-label ng-binding">Tối</label>
                                                <div class="col-sm-3">
                                                    <input type="number" value="0" ng-change="changeQuality()" min="0" step="1" class="form-control"
                                                        ng-model="Medicine.noon">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label ng-binding">Số Ngày</label>
                                                <div class="col-sm-3">
                                                    <input type="number" value="0" ng-change="changeQuality()" min="0" step="1" class="form-control"
                                                         style="">
                                                </div>
                                                <label class="col-sm-3 control-label ng-binding">Tổng</label>
                                                <div class="col-sm-3">
                                                    <input type="number" value="0" ng-change="changeQuality()" min="0" step="1" class="form-control"
                                                        >
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Cách Dùng</label>
                                                    <div class="col-md-8">
                                                        <input type="text" required name="name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Ghi Chú</label>
                                                    <div class="col-md-8">
                                                        <textarea rows="2" type="text" class="form-control" style=""></textarea>
                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group" style="margin-top: 50px;">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-condensed" style="width:1200px">
                                        <thead>
                                            <tr>
                                                <th width="3%" class="ng-binding">STT</th>
                                                <th width="15%" class="ng-binding">Tên thuốc
                                                    <br>Dược chất chính</th>
                                                <th width="8%" class="ng-binding">Đơn vị</th>
                                                <th width="8%" class="ng-binding">Đơn vị dùng</th>
                                                <th width="3%" class="ng-binding">Sáng</th>
                                                <th width="3%" class="ng-binding">Trưa</th>
                                                <th width="3%" class="ng-binding">Chiều</th>
                                                <th width="3%" class="ng-binding">Tối</th>
                                                <th width="5%" class="ng-binding">Số ngày</th>
                                                <th width="10%" class="ng-binding">Tổng</th>
                                                <th width="15%" class="ng-binding">Cách dùng thuốc</th>
                                                <th width="15%" class="ng-binding">Ghi chú</th>
                                                <!-- ngIf: !isDiagnosisHistoryForm -->
                                                <th ng-if="!isDiagnosisHistoryForm" width="5%" class="ng-binding ng-scope">Xóa</th>
                                                <!-- end ngIf: !isDiagnosisHistoryForm -->

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- ngRepeat: item in selectedMeds -->
                                            <tr ng-repeat="item in selectedMeds" class="ng-scope">
                                                <td width="3%" class="ng-binding">1</td>
                                                <td width="15%" class="ng-binding">
                                                    Aceclofenac
                                                    <!-- ngIf: item.ingredientObjs -->
                                                </td>
                                                <td width="8%">
                                                    <span class="ng-binding">Viên</span>
                                                </td>
                                                <td width="8%">
                                                    <span class="ng-binding">Viên</span>

                                                </td>


                                                <td width="3%">
                                                    <span class="ng-binding">1</span>

                                                </td>
                                                <td width="3%">
                                                    <span class="ng-binding">0</span>

                                                </td>
                                                <td width="3%">
                                                    <span class="ng-binding">1</span>

                                                </td>
                                                <td width="3%">
                                                    <span class="ng-binding">0</span>

                                                </td>


                                                <td width="5%">
                                                    <span class="ng-binding">1</span>
                                                </td>


                                                <td width="10%">
                                                    <span class="ng-binding">1</span>

                                                </td>
                                                <td width="15%">
                                                    <span class="ng-binding"></span>

                                                </td>
                                                <td width="15%">
                                                    <span class="ng-binding"></span>

                                                </td>
                                                <!-- ngIf: !isDiagnosisHistoryForm -->
                                                <td ng-if="!isDiagnosisHistoryForm" width="5%" class="ng-scope">
                                                    <button type="button" class="btn btn-xs btn-danger" ng-click="removeMedicine($index)">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                                <!-- end ngIf: !isDiagnosisHistoryForm -->
                                            </tr>
                                            <!-- end ngRepeat: item in selectedMeds -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-top:30px;">
                                        <button type="submit" class="btn btn-primary" >
                                            <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh 
                                        </button>
                                        <a href="{{route('list')}}" class="btn btn-default" >
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
    </div>
</div>
<!-- END CONTENT -->
@endsection

<script src="{!!url('global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
<script src="{!!url('ckeditor/ckeditor.js')!!}"></script>
