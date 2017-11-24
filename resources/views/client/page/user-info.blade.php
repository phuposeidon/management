@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 banner-info-1">
            <div class="banner-text text-center">
                <form action="">
                    <h1 class="white">Thông tin cá nhân</h1>

                    <div class="row user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Họ Tên: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" value="{{$getPatientById->fullname}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Ngày Sinh:</label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" value="{{Carbon\Carbon::parse($getPatientById->DOB)->format('d-m-Y')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Địa Chỉ: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" value="{{$getPatientById->address}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Giới Tính: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" value="<?php if($getPatientById->gender == 1) echo "Nam"; else echo "Nữ"?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Nhóm Máu: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" value="{{$getPatientById->bloodgroup}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Email: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" value="{{$getPatientById->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Số ĐT: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" value="{{$getPatientById->phone}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Username: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" value="{{$getPatientById->username}}" disabled>
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
                                    <input type="password" class="br-radius-zero">
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
                                    <input type="password" class="br-radius-zero">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Nhập lại MK: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="password" class="br-radius-zero">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="" class="btn btn-appoint">Cập nhật</a>
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