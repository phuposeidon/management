@extends('admin.layouts.master')
@section('content')
<!-- BEGIN CONTENT -->
     <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">
                
            </div>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Trang chủ</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Bài Viết</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Thêm Bài Viết</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">Thêm Bài Viết
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- CONTENT -->
             @if(Session::has('flash_message'))
                    <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
            @endif
            <form class="form-horizontal" action="{{URL::action('PostController@postEdit')}}" role="form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$getPostById->id}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Loại Bài Viết</label>
                            <div class="col-md-4">
                                <select name="categoryId" id="" class="form-control">
                                    @foreach($allCategory as $category)
                                    <option value="{{$category->id}}"
                                        @if($getPostById->categoryId == $category->id)
                                            selected
                                        @endif
                                    >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Ảnh Bài Viết</label>
                            <div class="fileinput fileinput-new col-md-6" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{asset('img/post/'.$getPostById->avatar)}}" alt="" /> </div>
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
                            <label class="col-md-2 control-label">Tên Bài Viết</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Nhập Tên Bài Viết" name="name" value="{{$getPostById->name}}">
                            </div>
                        </div>
                                
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nội Dung</label>
                            <div class="col-md-8">
                                <textarea name="content" class="summernote form-control" rows="10" >{!!$getPostById->content!!}</textarea>
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
                            <a href="{{asset('category/'.$getPostById->categoryId)}}">
                                <button type="button" class="btn btn-default" >
                                <i class="fa fa-lg fa-fw x fa fa-times"></i>Đóng
                            </button>
                            </a>
                    </div>
                </div>
            </div>
             <!-- END CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
</form>
    <!-- END CONTENT -->
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function()
            {
                $('#reportAdd').fadeOut();
            },4000);
        })
    </script>
@endsection
