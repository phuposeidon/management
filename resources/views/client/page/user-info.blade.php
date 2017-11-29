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
                                    <label for="" class="label-bottom label-textright">Ngày Sinh:</label>
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

                    <div class="row user-info">
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
                    <div class="row user-info">
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
                    
                    <button type="submit" class="btn btn-appoint">Cập nhật</button>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
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