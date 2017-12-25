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
                        <a href="#">Lịch hẹn</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Danh sách</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> DANH SÁCH HẸN
            </h1>
            <div class="alert alert-success" id="report" style="display: none">Đã xóa lịch hẹn thành công.</div>
	        <div class="alert alert-success" id="reportAll" style="display: none">Các lịch hẹn được chọn đã xóa thành công.</div>
            
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
                                <form action="{{URL::action('AppointmentController@list')}}" method="get" id="searchForm">
                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                        <input type="text" id="searchDate" name="searchDate" value="{{$searchDate}}" class="form-control" placeholder="Chọn ngày ...">
                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                             <form action="{{URL::action('AppointmentController@search')}}" method="get" id="searchComplete">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-search fa-spin font-blue"></i>
                                                        <input type="text" class="form-control" name="keyword"  placeholder="Tìm kiếm">
                                                     </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Tìm kiếm" class="btn btn-info">
                                                </div>
                                            </form>
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
                                                        <i class="fa fa-file-pdf-o"></i> Lưu như PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Xuất Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" >
                                    <thead>
                                        <tr>
                                            <th> STT </th>
                                            <!-- <th> Mã Bệnh Nhân </th> -->
                                            <th> Bệnh Nhân</th>
                                            <!-- <th> Phòng Khám </th> -->
                                            <th> Bác Sĩ</th>
                                            <th> Ngày </th>
                                            <th> Giờ </th>
                                            <th>Trạng thái</th>
                                            <!-- <th> Sửa </th> -->
                                            <th> Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1?>
                                        @foreach($allAppointments as $appointment)
                                        <tr class="odd gradeX" id="tr{{$appointment->id}}">
                                            <!-- <td>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="{{$appointment->id}}" />
                                                    <span></span>
                                                </label>
                                            </td> -->
                                            <td> {{$i}} </td>
                                            <!-- <td>
                                                {{$appointment->patientId}}
                                            </td> -->
                                            <td>
                                                {{$appointment->Patient->fullname}}
                                            </td>
                                            <!-- <td> {{$appointment->Clinic->name}} </td> -->
                                            <td> {{$appointment->User->fullname}} </td>
                                            <td class="center">{{Carbon\Carbon::Parse($appointment->appointmentDate)->format('d-m-Y')}}</td>
                                            <td> {{Carbon\Carbon::Parse($appointment->appointmentDate)->format('H:i')}} </td>
                                           <td class="status{{$appointment->id}}">
                                               @if($appointment->status=="new")
                                               <span style="margin-left: 20px;" class="label label-success">Mới</span> 
                                                @elseif($appointment->status=="confirmed")
                                                <span style="margin-left: 20px;" class="label label-warning">Đã tiếp nhận</span> 
                                                @else
                                                <span style="margin-left: 20px;" class="label label-danger">Đã hủy</span> 
                                                @endif
                                           </td>
                                            <td>
                                                <div>
                                                    <a data-id="{{$appointment->id}}" class="btn btn-xs green dropdown-toggle changeStatus"> <i class="fa fa-edit"></i>Tiếp nhận </a>
                                                    <a  class="btn btn-xs red dropdown-toggle cancel" data-id="{{$appointment->id}}"> <i class="fa fa-trash-o"></i>Hủy</a>                            
                                                </div>
                                            </td>
                                        </tr>

                                         <div class="modal fade" id="modal-1" style="margin-top: 12em ">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        <h4 class="modal-title">Hủy giao dịch</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn muốn hủy giao dịch?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                        <button type="button" class="btn btn-primary" id="yesBtn">Có</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <?php $i++?>
                                        @endforeach

                                        
                                    </tbody>
                                </table>
                           </div>
                            <div style="text-align: center;"> {{ $allAppointments->links() }}</div>
                            <button type="button" id="deleteAll" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"> </span>  Xóa tất cả</button>
                            <!-- $allAppointments->links() -->

                            <!-- làm modal delete -->
                            <!-- <div class="modal fade" id="modal-1" style="margin-top: 12em ">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">Xóa lịch hẹn</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn muốn xóa lịch hẹn?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                            <button type="button" class="btn btn-primary" id="yesBtn">Có</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- end modal delete -->


                            <!-- làm modal delete -->
                           <!-- /.modal -->

                            <!-- làm modal delete all row-->
                            <div class="modal fade" id="modal-all" style="margin-top: 12em ">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">Xóa các lịch hẹn đã chọn?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn muốn xóa các lịch hẹn đã chọn?</p>
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
   //          //Send search date
            $('#searchDate').change(function() {
                $('#searchForm').submit();
            });

            // $('#keyword').change(function() {
            //     $('#searchComplete').submit();
            // });
   //          //Xoá 1 dòng
   //          $('.delete').on('click',function(e){
   //              e.preventDefault();
   //              var id = $(this).data('id');
   //              $('#modal-1').data('id',id).modal('show');
   //          });
   //          $("#report").hide();
   //          $('#yesBtn').click(function(){
   //              var id = $('#modal-1').data('id');
   //              $('#modal-1').modal('hide');
   //              $.ajaxSetup({
   //                  headers: {
   //                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //                  }
   //              });
   //              $.ajax({
   //                  type: 'POST',
   //                  url: 'appointment-delete',
   //                  dataType: 'text',
   //                  data: {id: id},
   //                  success:function(data){
   //                      $('#tr' + id).fadeOut();
   //                      $('#tr' + id).remove();
   //                      $("#report").show();
   //                      setTimeout(function()
   //                          {
   //                              $('#report').fadeOut();
   //                          },4000);
   //                  }
   //              });
   //          });

   //          //Xoá tất cả
			// $('#deleteAll').on('click',function(e){
			// 	e.preventDefault();
			// 	$('#modal-all').modal('show');
			// });
			// $("#reportAll").hide();
			// $('#yesBtnAll').click(function(){
			// 	$('#modal-all').modal('hide');
			// 	var val = [];
			// 	$(':checkbox:checked').each(function(i){
			// 		val[i] = $(this).val();			//get id của từng row       	
			// 	});
			// 	if(val[0] == 'on') {				//Nếu th đã check thì bỏ qua
			// 		val.shift();
			// 	}
			// 	$.ajaxSetup({
			// 		headers: {
			// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 		}
			// 	});
			// 	$.ajax({
			// 		type: 'POST',
			// 		url: 'appointment-multidelete',
			// 		dataType: 'text',
			// 		data: {id: val},
			// 		success:function(data){
			// 			for(var i = 0; i < val.length; i++) {
			// 				$('#tr' + val[i]).fadeOut();
			// 				$('#tr' + val[i]).remove();
			// 				$("#reportAll").show();
			// 				setTimeout(function()
   //                          {
   //                          	$('#reportAll').fadeOut();
   //                          },4000);
			// 			}
			// 		}
			// 	});
			// });

            // Change status
            $('.changeStatus').on('click', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
               $.post('appointment/change-status', {id: id}, function(data, textStatus, xhr) {
                   $('.status'+id).html(data);
               });
            });


            $('.cancel').on('click', function(e) {
                 e.preventDefault();
                var id = $(this).data('id');
                $('#modal-1').data('id',id).modal('show');
            });

             $('#yesBtn').click(function(){
                     event.preventDefault();
                     $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                    var id = $('#modal-1').data('id');
                    $('#modal-1').modal('hide');
                    $.post('appointment/cancel', {id: id}, function(data) {
                       $('.status'+id).html(data);
                        // $('.td'+id).html(data);
                    });
                })


            //

        })
    </script>
@endsection