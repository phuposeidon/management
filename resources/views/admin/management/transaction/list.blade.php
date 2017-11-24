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
                                        <th> Mã Hóa Đơn </th>
                                        <th> Bệnh nhân</th>
                                        <th> Số Tiền</th>
                                        <th> Người Tạo</th>
                                        <th> Ngày Tạo</th>
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allTransactions as $transaction)
                                    <tr class="odd gradeX" id="tr{{$transaction->id}}">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="{{$transaction->id}}" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td> {{$transaction->id}} </td>
                                        <td> {{$transaction->Order->orderCode}} </td>
                                        <td> {{$transaction->Order->MedicalRecord->Patient->fullname}} </td>
                                        <td> {{number_format($transaction->totalAmount).' VNĐ'}} </td>
                                        <td> {{\App\Http\Controllers\TransactionController::getUser($transaction->createdById)}}  </td>
                                        <td class="center"> {{Carbon\Carbon::parse($transaction->createdAt)->format('d-m-Y H:i:s')}} </td>
                                        <td>
                                            <div>
                                                <a href="" class="btn btn-xs green dropdown-toggle"> Sửa</a>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="" class="btn btn-xs red dropdown-toggle delete" data-id="{{$transaction->id}}"> Xóa</a>                               
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>

                            <button type="button" id="deleteAll" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"> </span>  Xóa tất cả</button>
                            {{$allTransactions->links()}}

                            <!-- làm modal delete -->
                            <div class="modal fade" id="modal-1" style="margin-top: 12em ">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">Xóa giao dịch</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn muốn xóa giao dịch?</p>
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
                    url: 'transaction-delete',
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
					url: 'transaction-multidelete',
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


        })
    </script>


@endsection