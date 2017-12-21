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
                        <a href="#">Chuyên khoa</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Danh sách</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"><i class="fa-fw fa fa-stethoscope"></i> DANH SÁCH KHÁM
            </h1>
            <div class="alert alert-success" id="report" style="display: none">Đã xóa chuyên khoa thành công.</div>
	        <div class="alert alert-success" id="reportAll" style="display: none">Các chuyên khoa được chọn đã xóa thành công.</div>
          
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
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <!-- <a id="sample_editable_1_new" data-toggle="modal" href="#draggable" class="btn sbold green"> Thêm
                                                <i class="fa fa-plus"></i>
                                            </a> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Công cụ
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
                                        <th> STT </th>
                                        <th> Ngày</th>
                                        <th> Tên Bệnh Nhân </th>
                                        <th> Giới Tính </th>
                                        <th> Trạng Thái </th>
                                        <th> Khám </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($waiters as $key => $waiter)
                                    <tr>
                                        <td>{{$i--}}</td>
                                        <td>{{Carbon\Carbon::Parse($waiter->appointmentDate)->format('d-m-Y H:i:s')}}</td>
                                        <td>{{App\Appointment::find($waiter->id)->Patient->fullname}}</td>
                                        <td>
                                            @if(App\Appointment::find($waiter->id)->Patient->gender==0)
                                                Nữ
                                            @else
                                                Nam
                                            @endif
                                        </td>
                                        <td>
                                            @if(App\Appointment::find($waiter->id)->status=="new")
                                            Đã Tiếp Nhận
                                            @else
                                            Đang Khám
                                            @endif

                                        </td>
                                        <td style="text-align: center;">
                                            <div>
                                                <a href="{{asset('diagnosis')}}/{{$waiter->patientId}}" class="btn btn-xs green dropdown-toggle edit-modal"><i class="fa fa-stethoscope"></i></a>                                              
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             {{$waiters->links()}}

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