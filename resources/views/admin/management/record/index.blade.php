@extends('admin.layouts.master')
@section('content')
     <!-- BEGIN CONTENT -->
     <script src="{!!url('global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
<script src="{!!url('ckeditor/ckeditor.js')!!}"></script>
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
                        <span>Danh sách mẫu bệnh án</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> 
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
                                <span class="caption-subject bold uppercase"> DANH sách MẪU BỆNH ÁN</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a id="sample_editable_1_new" data-toggle="modal" href="#draggable" class="btn sbold green"> Thêm
                                                <i class="fa fa-plus"></i>
                                            </a>
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
                                                        <i class="fa fa-print"></i> In </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Lưu thành PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Xuất sang Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                <span></span>
                                            </label>
                                        </th> -->
                                        <th> STT </th>
                                        <th> Mẫu bệnh án</th>
                                        <th> Ngày tạo </th>
                                        <th> Sửa </th>
                                        <th> Xóa </th>
                                    </tr>
                                </thead>
                                <tbody id="render_record">
                                   @foreach($records as $record)
                                    <tr>
                                        <td>{{$record['id']}}</td>
                                        <td>{{$record['name']}}</td>
                                        <td>{{Carbon\Carbon::Parse($record['createdAt'])->format('d-m-Y')}}</td>
                                        <td>
                                            <div>
                                                <a href="#edit" data-toggle="modal" data-target="#edit"    class="btn btn-xs green dropdown-toggle edit-modal"> Sửa</a>                                              
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="" class="btn btn-xs red dropdown-toggle delete" > Xóa</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>

                            <button type="button" id="deleteAll" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"> </span>  Xóa tất cả</button>
                            <!-- $allSpecialitys->links() -->

                                 <div class="modal fade draggable-modal" data-id="" id="edit" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">SửaChuyên Khoa</h4>
                                                <div id="test"></div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form form-horizontal">
                                            <fieldset>
                                                <div class="form-group">

                                                    <label class="control-label col-sm-3 ng-binding">Chuyên Khoa </label>

                                                    <div class="col-sm-8">
                                                        <input type="text" id="edit-specialization" class="form-control " required="" >
                                                    </div>
                                                </div>

                                                <!-- ngIf: isFMP -->

                                                <div class="form-group">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <div class="mt-checkbox-list">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input id="edit-active" checked value="1" type="checkbox">Hoạt Động
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                     </div>
                                             </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Hủy</button>
                                                <button type="button" id="save_edit" class="btn green">Lưu</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                            <!-- /.modal-dialog -->
                                </div>

                                {{--  edit   --}}
                                <div class="modal fade draggable-modal"  id="draggable"  tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Thêm mẫu bệnh án</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form form-horizontal">
                                            <fieldset>
                                                <div class="form-group">

                                                    <label class="control-label col-sm-2 ng-binding">Tên mẫu bệnh án </label>

                                                    <div class="col-sm-6">
                                                        <input type="text" id="name" class="form-control " required="" >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <div class="col-md-12">
                                                            <label>Nội dung</label>
                                                            <textarea cols="80" id="editor1" rows="10">
                                                               
                                                            </textarea>
                                                            <script>
                                                                CKEDITOR.replace('editor1');
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                     </div>
                                             </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Hủy</button>
                                                <button type="button" id="save_record" class="btn green">Lưu</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                            <!-- /.modal-dialog -->
                                </div>

                            <!-- làm modal delete -->
                            <div class="modal fade" id="modal-1" style="margin-top: 12em ">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">Xóa chuyên khoa</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn muốn xóa chuyên khoa?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                            <button type="button" class="btn btn-primary" id="yesBtn">Có</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- end modal delete -->

                            <!-- làm modal delete all row-->
                            <div class="modal fade" id="modal-all" style="margin-top: 12em ">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">Xóa các chuyên khoa đã chọn?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn muốn xóa các chuyên khoa đã chọn?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                            <button type="button" class="btn btn-primary" id="yesBtnAll">Có</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- end modal delete all row--> 

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {      
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            
           $('#save_record').click(function(event) {
               // var ckeditor = $( 'textarea#editor1' ).val();
               var ckeditor = CKEDITOR.instances.editor1.getData();
               var name = $('#name').val();
               if (name=="") {
                alert('Vui lòng nhập tên mẫu bệnh án');
               }else{
                    $.post('record', {content: ckeditor,name:name}, function(data) {
                        if(data)
                        {
                            location.reload();
                        }else{
                            alert('Something went wrong !');
                        }
                   });
               }
               
           });
        })
    </script>

@endsection