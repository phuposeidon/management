@extends('admin.layouts.master')
@section('content')
     <!-- BEGIN CONTENT -->
     <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler"> </div>
                <div class="toggler-close"> </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
                        <span> THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                        </ul>
                    </div>
                    <div class="theme-option">
                        <span> Layout </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Header </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Top Menu Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Mode</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Style </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Footer </span>
                        <select class="page-footer-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
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
                        <a href="#">Người dùng</a>
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
            <h1 class="page-title"> DANH SÁCH NGƯỜI DÙNG
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
                                        <th> ID </th>
                                        <th> Firstname</th>
                                        <th> Lastname </th>
                                        <th> Fullname</th>
                                        <th> Address </th>
                                        <th> Email </th>
                                        <th> Gender </th>
                                        <th> Phone Number</th>
                                        <th> Note </th>
                                        <th> User Type </th>
                                        <th> Created At</th>
                                        <th> Updated At</th>
                                        <th> Username </th>
                                        <th> Verify Code </th>
                                        <th> Speciality </th>
                                        <th> Clinic </th>
                                        <th> Actions </th>
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
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-docs"></i> New Post </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-tag"></i> New Comment </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-user"></i> New User </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-flag"></i> Comments
                                                            <span class="badge badge-success">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
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
                                        <td> vopl </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-docs"></i> New Post </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-tag"></i> New Comment </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-user"></i> New User </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-flag"></i> Comments
                                                            <span class="badge badge-success">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
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
                                        <td> userwow </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-docs"></i> New Post </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-tag"></i> New Comment </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-user"></i> New User </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-flag"></i> Comments
                                                            <span class="badge badge-success">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
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
                                        <td> wap </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-docs"></i> New Post </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-tag"></i> New Comment </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-user"></i> New User </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-flag"></i> Comments
                                                            <span class="badge badge-success">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
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
                                        <td> test </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-docs"></i> New Post </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-tag"></i> New Comment </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-user"></i> New User </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-flag"></i> Comments
                                                            <span class="badge badge-success">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
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
                                        <td> toop </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-docs"></i> New Post </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-tag"></i> New Comment </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-user"></i> New User </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-flag"></i> Comments
                                                            <span class="badge badge-success">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
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
                                        <td> weep </td>
                                        <td>
                                            <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Suspended </span>
                                        </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td class="center"> 12.12.2011 </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td> kop </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-docs"></i> New Post </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-tag"></i> New Comment </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-user"></i> New User </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-flag"></i> Comments
                                                            <span class="badge badge-success">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
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