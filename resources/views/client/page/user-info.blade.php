@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 banner-info-1">
            <div class="banner-text text-center">
                <form action="{{asset('user-info')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="white">Thông tin cá nhân</h1>

                    @if($errors->any())
                        <div class="alert alert-danger col-sm-12" id="report">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(Session::has('flash_message'))
                        <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
                    @endif

                    <div class="row user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Họ Tên: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero reg-input" name="fullname"  value="{{$getPatientById->fullname}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">NgàySinh:</label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero reg-input datepicker" name="DOB" value="{{Carbon\Carbon::parse($getPatientById->DOB)->format('d-m-Y')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Địa Chỉ: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero reg-input" name="address" value="{{$getPatientById->address}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Giới Tính: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    
                                    <select class="br-radius-zero reg-input" name="gender">
                                        <option value="0" <?php if($getPatientById->gender == 0) echo "selected"?> >Nữ</option>
                                        <option value="1" <?php if($getPatientById->gender == 1) echo "selected"?>>Nam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Username: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero reg-input" name="username" value="{{$getPatientById->username}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Email: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero reg-input" name="email" value="{{$getPatientById->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Số ĐT: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero reg-input" name="phone" value="{{$getPatientById->phone}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Nhóm Máu: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero reg-input" name="bloodgroup" value="{{$getPatientById->bloodgroup}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="white"> Đổi mật khẩu</h4>

                    <div class="col-md-12 user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">MK cũ: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="password" name="old_password" class="br-radius-zero reg-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">MK mới: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="password" name="password" class="br-radius-zero reg-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Nhập lại MK: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="password" name="retype_password" class="br-radius-zero reg-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-appoint" style="margin-top: 10px">Cập nhật</button>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="service" class="section-padding section-color">
    <div class="container">
        <h1 class="text-center">Lịch sử khám</h1>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ngày Khám</th>
                            <th>Bác Sĩ</th>
                            <th>Khoa</th>
                            <th>Tổng Tiền</th>
                            <th>Xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @foreach($getOrders as $order)
                            <tr style="color: #333">
                                <th>{{$i}}</th>
                                <th>{{Carbon\Carbon::Parse($order->createdAt)->format('d-m-Y')}}</th>
                                <th><a href="{{asset('feedback/'.$order->MedicalRecord->User->id)}}">{{$order->MedicalRecord->User->fullname}}</a></th>
                                <th>{{$order->MedicalRecord->User->Specialization->name}}</th>
                                <th class="text-right">{{number_format($order->totalAmount)}}đ</th>
                                <th>
                                    <a href="#order-{{$order->id}}" data-toggle="modal" class="btn btn-info" style="margin-top: 0"><i class="fa fa-money"></i></a>
                                    <a href="#medicine-{{$order->id}}" data-toggle="modal" class="btn btn-primary" style="margin-top: 0"><i class="fa fa-eye"></i></a>
                                
                                </th>
                            </tr>
                        <?php $i++;?>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
            
        </div>

    </div>

    <!-- modal order -->
    @foreach($getOrders as $order)
    <div class="modal fade" id="order-{{$order->id}}" style="margin-top: 2em ">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Mã hóa đơn {{$order->orderCode}}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Bác Sĩ: <span style="color: #333">{{$order->MedicalRecord->User->fullname}}</span></label>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="">Ngày Khám: <span style="color: #333">{{Carbon\Carbon::Parse($order->createdAt)->format('d-m-Y')}}</span></label>
                        </div>
                    </div>
                    <h3>Dịch vụ sử dụng</h3>

                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Dịch vụ</th>
                                <th>Loại DV</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $getServices = App\OrderService::where('orderId', $order->id)->get();
                                $t = 1;
                            ?>
                            @if(count($getServices) > 0)
                                @foreach($getServices as $service)
                                    <tr style="color: #333">
                                        <th>{{$t}}</th>
                                        <th>{{$service->Service->name}}</th>
                                        <th>{{$service->Service->serviceCode}}</th>
                                        <th>{{number_format($service->Service->price)}}đ</th>
                                    </tr>
                                <?php $t++; ?>
                                @endforeach
                            @else
                                <tr style="color: #333">
                                    <th>{{$t}}</th>
                                    <th>Khám thường</th>
                                    <th>BT</th>
                                    <th>250,000đ</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <h3>Danh sách thuốc</h3>

                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Thuốc</th>
                                <th>ĐVT</th>
                                <th>SL</th>
                                <th>Đơn Giá</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $getMedicines = App\OrderMedicine::where('orderId', $order->id)->get();
                                $j = 1;
                            ?>
                            @foreach($getMedicines as $medicine)
                            <tr style="color: #333;">
                                <th>{{$j}}</th>
                                <th>{{$medicine->Medicine->name}}</th>
                                <th>{{$medicine->Medicine->Unit->name}}</th>
                                <th>{{$medicine->amount}}</th>
                                <th>{{number_format($medicine->Medicine->price)}}đ</th>
                                <th>{{number_format($medicine->totalPrice)}}đ</th>
                            </tr>
                            <?php $j++; ?>
                            @endforeach
                        </tbody>
                    </table>

                    <h3>Tổng cộng: <span style="color: red">{{number_format($order->totalAmount)}}đ</span></h3>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endforeach
    <!-- end modal order -->

    <!-- modal order -->
    @foreach($getOrders as $order)
    <div class="modal fade" id="medicine-{{$order->id}}" style="margin-top: 2em">
        <div class="modal-dialog" role="document" style="width: 800px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Mã hóa đơn {{$order->orderCode}}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Bác Sĩ: <span style="color: #333">{{$order->MedicalRecord->User->fullname}}</span></label>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="">Chẩn Đoán: <span style="color: #333">{{$order->MedicalRecord->diagnosis}}</span></label>
                        </div>
                    </div>
                    <h3>Hướng dẫn sử dụng</h3>

                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Thuốc</th>
                                <th>ĐVT</th>
                                <th>Cách Dùng</th>
                                <th>Sáng</th>
                                <th>Trưa</th>
                                <th>Chiều</th>
                                <th>Tối</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $getMedicines = App\OrderMedicine::where('orderId', $order->id)->get();
                                $j = 1;
                            ?>
                            @foreach($getMedicines as $medicine)
                            <tr style="color: #333;">
                                <th>{{$j}}</th>
                                <th>{{$medicine->Medicine->name}}</th>
                                <th>{{$medicine->Medicine->Unit->name}}</th>
                                <th>{{$medicine->using_med}}</th>
                                <th>{{$medicine->morning}}</th>
                                <th>{{$medicine->afternoon}}</th>
                                <th>{{$medicine->evening}}</th>
                                <th>{{$medicine->night}}</th>
                            </tr>
                            <?php $j++; ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endforeach
    <!-- end modal order -->


  </section>
    @include('client.layouts.footer')

    <script>
        $('document').ready(function() {
            //active menu bar
            $('#myNavbar ul .indexBtn').removeClass('active');
        });
    </script>
</body>

</html>