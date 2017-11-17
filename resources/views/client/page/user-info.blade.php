@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-2 col-md-8 banner-info-1">
            <div class="banner-text text-center">
                <form action="">
                    <h1 class="white">Thông tin cá nhân</h1>

                    <div class="row user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Họ Tên: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">NgàySinh:</label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Địa chỉ: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">GiớiTính: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">NhómMáu: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Email: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Số ĐT: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Username: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="white">Đổi mật khẩu</h4>

                    <div class="row user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">MK cũ: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row user-info">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">MK mới: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="" class="label-bottom">Nhập lại MK: </label>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <input type="text" class="br-radius-zero">
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