@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 banner-info-1">
            <div class="banner-text text-center">
                
                <form action="{{asset('signup')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="white">Đăng ký thành viên</h1>

                    @if($errors->any())
                        <div class="alert alert-danger col-sm-12" id="report">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    <div class="row user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Họ Tên: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="fullname" value="{{old('fullname')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Ngày Sinh:</label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero datepicker" name="DOB" value="{{old('DOB')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Địa Chỉ: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="address" value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Giới Tính: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <select class="br-radius-zero" name="gender">
                                        <option value="0">Nữ</option>
                                        <option value="1">Nam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">CMND: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="passport" value="{{old('passport')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Nhóm Máu: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <select class="br-radius-zero" name="bloodgroup">
                                        <option value="">Chưa biết</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Email: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="email" class="br-radius-zero" name="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Số ĐT: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="phone" value="{{old('phone')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Username: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="username" value="{{old('username')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom label-textright">Mật Khẩu: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="password" class="br-radius-zero" name="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-appoint">Đăng ký</button>
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

            setTimeout(function()
            {
            	$('#report').fadeOut();
            },4000);
        });
    </script>
</body>

</html>