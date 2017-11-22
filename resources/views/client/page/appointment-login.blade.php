@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3 col-md-6 banner-info-1">
            <div class="banner-text">
                <form action="">
                    <h1 class="white text-center">Đăng nhập</h1>

                    @if(isset(Auth::guard('patient')->user()->username))
                    <p class="white text-center">Bạn đã đăng nhập, bấm "Tiếp tục" để tiến hành đặt lịch khám.</p>
                    @else
                    <p class="white text-center">Nếu đã đăng ký thành viên, bạn vui lòng <a href="#sign-in" data-toggle="modal">đăng nhập</a> để đặt lịch khám.</p>
                    <p class="white text-center">Nếu chưa có, vui lòng nhập thông tin để tiếp tục đặt lịch khám.</p>
                    @endif   

                    <div class="form-group" style="margin-top: 40px;">
                        <label for="" class="label-bottom text-left">Họ Tên: </label>
                        <input type="text" class="form-control br-radius-zero" name="fullname" required oninvalid="this.setCustomValidity('Vui lòng điền họ tên')"
    oninput="setCustomValidity('')" <?php if(isset(Auth::guard('patient')->user()->username)) { echo "disabled";} ?> />
                    </div>
                    <div class="form-group">
                        <label for="" class="label-bottom">Điện thoại: </label>
                        <input type="text" class="form-control br-radius-zero" name="phonenumber" required oninvalid="this.setCustomValidity('Vui lòng điền số điện thoại')"
    oninput="setCustomValidity('')" <?php if(isset(Auth::guard('patient')->user()->username)) { echo "disabled";} ?>/>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-bottom">Email: </label>
                        <input type="email" class="form-control br-radius-zero" name="email" required oninvalid="this.setCustomValidity('Vui lòng điền địa chỉ email')"
    oninput="setCustomValidity('')" <?php if(isset(Auth::guard('patient')->user()->username)) { echo "disabled";} ?>/>
                        
                    </div>

                    <!-- <button type="submit" class="btn btn-appoint">Chọn giờ</button> -->
                    <center><a href="{{asset('appointments')}}" class="btn btn-appoint">Tiếp tục</a></center>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
    @include('client.layouts.footer')

    <script>
        $(document).ready(function() {
            //active menu bar
            $('#myNavbar ul .indexBtn').removeClass('active');
            $('#myNavbar ul .bookingBtn').addClass('active');
        });
    </script>
</body>

</html>