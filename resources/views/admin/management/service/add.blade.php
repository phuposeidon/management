@extends('admin.layouts.master') @section('content')
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
                    <a href="#">Thuốc</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Thêm Lịch Hẹn</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Thêm Dịch Vụ
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- CONTENT -->
        @if(Session::has('flash_message'))
        <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
        @endif
        <form class="form-horizontal" action="{{route('addService')}}" method="POST" role="form">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Tên Dịch Vụ</label>
                                <div class="col-md-9">
                                    <input type="text" required name="name" class="form-control" placeholder="  ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Chuyên Khoa</label>
                                <div class="col-md-9">
                                    <select name="serviceCode" class="form-control">
                                        <option value="BT">Dịch vụ thường</option>
                                        <option value="CDHA">Dịch vụ CĐHA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Chuyên Khoa</label>
                                <div class="col-md-9">
                                    <select name="user" class="form-control">
                                        @foreach($allSpecialization as $specialization)
                                        <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Giá</label>
                                <div class="col-md-9">
                                    <input type="number" required name="price" class="form-control" placeholder="  ">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-9">
                                    <div class="mt-checkbox-list">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input checked type="checkbox">Hoạt Động
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END INFO LEFT -->
                    <div class="col-md-8">
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-2 control-label">Nội dung</label>
                                <div class="col-md-10">
                                    <textarea cols="50" name="content" id="editor1" rows="10">

                                    </textarea>
                                </div>

                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center" style="margin-top:30px;">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-lg fa-fw x fa fa-floppy-o"></i>Lưu
                            </button>
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-lg fa-fw x fa fa-refresh"></i>Refresh
                            </button>
                            <a href="{{route('getService')}}" class="btn btn-default">
                                <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </form>
    </div>
    <!-- END CONTENT -->
    @endsection

    <script src="{!!url('global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
    <script src="{!!url('ckeditor/ckeditor.js')!!}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $('#reportAdd').fadeOut();
            }, 4000);


        })
    </script>