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
                        <a href="#">Giao dịch</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Danh sách</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> DANH SÁCH GIAO DỊCH
            </h1>
            <div class="alert alert-success" id="report" style="display: none">Đã xóa giao dịch thành công.</div>
	        <div class="alert alert-success" id="reportAll" style="display: none">Các giao dịch được chọn đã xóa thành công.</div>
            
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
                                    <div class="col-md-10">
                                        <form class="form-horizontal">
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Từ ngày</label>
                                                    <div class="col-md-8">
                                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        <input name="fromDate" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Đến ngày</label>
                                                    <div class="col-md-8">
                                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        <input  name="toDate" type="text" class="form-control">
                                                        
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2">
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
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" >
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                <span></span>
                                            </label>
                                        </th>
                                        <th> STT </th>
                                        <th> Mã Hóa Đơn </th>
                                        <th> Bệnh nhân</th>
                                        <th> Số Tiền</th>
                                        <th> Ngày Tạo</th>
                                        <th> Trạng Thái</th>
                                        <th> Hành Động </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1?>
                                    @foreach($orders as $order)
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td> {{$i}} </td>

                                        <td> {{$order->orderCode}} </td>
                                        <td> {{$order->MedicalRecord->Patient['fullname']}} </td>
                                        <td id="totalAmount"> {{number_format($order->totalAmount).' VNĐ'}} </td>
                                        <td class="center"> {{Carbon\Carbon::parse($order->createdAt)->format('d-m-Y H:i:s')}} </td>
                                        <td class="td{{$order->id}}">
                                            @if($order->status=="new")
                                            <span style="margin-left: 20px;" class="label label-warning">Hóa đơn mới</span>
                                            @elseif($order->status=="confirm")
                                            <span style="margin-left: 20px;" class="label label-success">Đã thanh toán</span>
                                            @elseif($order->status=="cancel")
                                            <span style="margin-left: 20px;" class="label label-danger">Đã hủy</span>
                                            @endif

                                        </td>
                                        <td>
                                            <div>

                                                <a data-id="{{$order->id}}" class="btn btn-xs green dropdown-toggle payment"> Thanh Toán</a>
                                                <a class="btn btn-xs red dropdown-toggle cancel" data-id="{{$order->id}}"> Hủy</a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++?>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                           <div style="text-align: center;"> {{ $orders->links() }}</div>

                            <!-- $allTransactions->links() -->

                            <!-- làm modal delete -->
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
                                            <h4 class="modal-title">Xóa các giao dịch đã chọn?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn muốn xóa các giao dịch đã chọn?</p>
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
    <!-- END CONTENT --><script>
        $(document).ready(function() {
            //Xoá 1 dòng
            // $('.delete').on('click',function(e){
            //     e.preventDefault();
            //     var id = $(this).data('id');
            //     $('#modal-1').data('id',id).modal('show');
            // });
            // $("#report").hide();
            // $('#yesBtn').click(function(){
            //     var id = $('#modal-1').data('id');
            //     $('#modal-1').modal('hide');
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         type: 'POST',
            //         url: 'transaction-delete',
            //         dataType: 'text',
            //         data: {id: id},
            //         success:function(data){
            //             $('#tr' + id).fadeOut();
            //             $('#tr' + id).remove();
            //             $("#report").show();
            //             setTimeout(function()
            //                 {
            //                     $('#report').fadeOut();
            //                 },4000);
            //         }
            //     });
            // });

            //Xoá tất cả
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
			// 		url: 'transaction-multidelete',
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

            //Thanh toán
            $('.payment').on('click', function(event) {
                event.preventDefault();
                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var id = $(this).data('id');
                $.post('transaction/payment', {id: id}, function(data) {
                    $('.td'+id).html(data);
                });

            });

            //Hủy thanh toán
            $('.cancel').on('click', function(e) {
                 e.preventDefault();
                var id = $(this).data('id');
                $('#modal-1').data('id',id).modal('show');
            });
            //End
            $('#yesBtn').click(function(){
                     event.preventDefault();
                     $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var id = $('#modal-1').data('id');
                    $('#modal-1').modal('hide');
                    $.post('transaction/cancel', {id: id}, function(data) {
                        $('.td'+id).html(data);
                    });
                })

        })
    </script>


@endsection