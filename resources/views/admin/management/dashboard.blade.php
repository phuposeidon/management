@extends('admin.layouts.master')
@section('content')
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
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> TRANG CHỦ
        </h1>
        
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="chart_visits">
                                    {!! $chart_visits->html() !!}
                                </div>

                                <div class="chart_totalAmounts">
                                    {!! $chart_totalAmounts->html() !!}
                                </div>
                                
                            </div>
                        </div>
                        

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        
    </div>
    <!-- END CONTENT BODY -->
    
</div>

@endsection

@section('script')
        {!! Charts::scripts() !!}
        {!! $chart_visits->script() !!}
        {!! $chart_totalAmounts->script()!!}
@endsection