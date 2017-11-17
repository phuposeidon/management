@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-2 col-md-8 banner-info-1">
            <div class="banner-text text-center">
                <form action="{{asset('signup')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="white">Đăng ký thành viên</h1>

                    <div class="row user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Họ Tên: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="fullname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">NgàySinh:</label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="date" class="br-radius-zero" name="birthday">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Địa chỉ: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">GiớiTính: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <select class="br-radius-zero" name="gender">
                                        <option value="0">Nữ</option>
                                        <option value="1">Nam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">NhómMáu: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <select class="br-radius-zero" name="bloodgroup">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Email: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="email" class="br-radius-zero" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Số ĐT: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="phonenumber">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Username: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" name="username">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">MậtKhẩu: </label>
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
        });
    </script>
</body>

</html>