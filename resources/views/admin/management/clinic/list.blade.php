@extends('admin.layouts.master')
@section('content')
     <!-- BEGIN CONTENT -->
     <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Trang chủ</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Phòng khám</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Danh sách</span>
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
            <h1 class="page-title"> DANH SÁCH PHÒNG KHÁM
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
           
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> DANH SÁCH</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Thêm
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                <span></span>
                                            </label>
                                        </th>
                                        <th> STT </th>
                                        <th> Tên Phòng Khám </th>
                                        <th> Địa Chỉ</th>
                                        <th> Domain</th>
                                        <th> Liên Hệ </th>
                                        <th> Số ĐT</th>
                                        <th> Giấy Phép</th>
                                        <th> Mã Số Thuế</th>
                                        <th> Ngày Tạo</th>
                                        <th> Ngày Sửa</th>
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td>
                                            <div>
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Sửa</button>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <button class="btn btn-xs red dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Xóa</button>                               
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td>
                                            <div>
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Sửa</button>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <button class="btn btn-xs red dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Xóa</button>                               
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td>
                                            <div>
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Sửa</button>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <button class="btn btn-xs red dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Xóa</button>                               
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection