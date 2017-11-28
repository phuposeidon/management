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
            <h1 class="page-title"> DANH SÁCH CHUYÊN KHOA
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
                                        <th>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                <span></span>
                                            </label>
                                        </th>
                                        <th> STT </th>
                                        <th> Tên Chuyên Khoa</th>
                                        <th> Thuộc Phòng Khám </th>
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allSpecialitys as $speciality)
                                    <tr class="odd gradeX" id="tr{{$speciality->id}}">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="{{$speciality->id}}" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td> {{$speciality->id}} </td>
                                        <td> {{$speciality->name}} </td>
                                        <td> {{$speciality->Clinic->name}} </td>
                                        
                                        <td>
                                            <div>
                                                <a href="#edit" data-toggle="modal" data-target="#edit"   data-id="{{$speciality->id}}" class="btn btn-xs green dropdown-toggle edit-modal"> Sửa</a>                                              
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="" class="btn btn-xs red dropdown-toggle delete" data-id="{{$speciality->id}}"> Xóa</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>

                            <button type="button" id="deleteAll" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"> </span>  Xóa tất cả</button>
                            <!-- $allSpecialitys->links() -->

                                 <div class="modal fade draggable-modal" data-id="{{$speciality->id}}" id="edit" tabindex="-1" role="basic" aria-hidden="true">
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
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Thêm Chuyên Khoa</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form form-horizontal">
                                            <fieldset>
                                                <div class="form-group">

                                                    <label class="control-label col-sm-3 ng-binding">Chuyên Khoa </label>

                                                    <div class="col-sm-8">
                                                        <input type="text" id="specialization" class="form-control " required="" >
                                                    </div>
                                                </div>

                                                <!-- ngIf: isFMP -->

                                                <div class="form-group">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <div class="mt-checkbox-list">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input id="active" checked value="1" type="checkbox">Hoạt Động
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
                                                <button type="button" id="save_ck" class="btn green">Lưu</button>
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

    <script>
        $(document).ready(function() {
            //Xoá 1 dòng
            $('.delete').on('click',function(e){
                e.preventDefault();
                var id = $(this).data('id');
                $('#modal-1').data('id',id).modal('show');
            });
            $("#report").hide();
            $('#yesBtn').click(function(){
                var id = $('#modal-1').data('id');
                $('#modal-1').modal('hide');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'specialization-delete',
                    dataType: 'text',
                    data: {id: id},
                    success:function(data){
                        $('#tr' + id).fadeOut();
                        $('#tr' + id).remove();
                        $("#report").show();
                        setTimeout(function()
                            {
                                $('#report').fadeOut();
                            },4000);
                    }
                });
            });

            //Xoá tất cả
			$('#deleteAll').on('click',function(e){
				e.preventDefault();
				$('#modal-all').modal('show');
			});
			$("#reportAll").hide();
			$('#yesBtnAll').click(function(){
				$('#modal-all').modal('hide');
				var val = [];
				$(':checkbox:checked').each(function(i){
					val[i] = $(this).val();			//get id của từng row       	
				});
				if(val[0] == 'on') {				//Nếu th đã check thì bỏ qua
					val.shift();
				}
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type: 'POST',
					url: 'specialization-multidelete',
					dataType: 'text',
					data: {id: val},
					success:function(data){
						for(var i = 0; i < val.length; i++) {
							$('#tr' + val[i]).fadeOut();
							$('#tr' + val[i]).remove();
							$("#reportAll").show();
							setTimeout(function()
                            {
                            	$('#reportAll').fadeOut();
                            },4000);
						}
					}
				});
			});


            $('#save_ck').click(function(){
                var specialization = $('#specialization').val();
                var active = $('#active').val();

               $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type: 'POST',
					url: 'specialization',
					dataType: 'text',
					data: {specialization: specialization,active:active},
					success:function(data){
						if(data){
                            location.reload();
                        }else{
                            alert('Something went wrong!');
                        }
					}
				});
            })
   $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
				        });
            $('.edit-modal').on('click',function(){
               var id = $(this).data('id');

                 $.get("specialization/"+id, function(data){
                     var data = jQuery.parseJSON(data);
                    $('#edit-specialization').val(data.name);
                    $('#edit-active').val(data.active);

                    $('#save_edit').on('click',function(){
                        var specialization =  $('#edit-specialization').val();  
                      

                        $.ajax({
                            type: 'POST',
                            url: 'specialization/'+id,
                            dataType: 'json',
                            data: {specialization: specialization,id:id},
                            success:function(data){
                                if(data){
                                    location.reload();
                                }else{
                                    alert('Something went wrong!');
                                }
                            }
                        });           
                    })
                 });         
            });
        });
    </script>
@endsection