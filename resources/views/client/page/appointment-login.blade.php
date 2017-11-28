@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-2 col-md-8 banner-info-1">
            <div class="banner-text">
                <form action="{{asset('appointments')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="white text-center">Đăng nhập</h1>

                    @if(isset(Auth::guard('patient')->user()->username))
                    <p class="white text-center">Bạn đã đăng nhập, bấm "Tiếp tục" để tiến hành đặt lịch khám.</p>
                    @else
                    <p class="white text-center">Nếu đã đăng ký thành viên, bạn vui lòng <a href="#sign-in" data-toggle="modal">đăng nhập</a> để đặt lịch khám.</p>
                    <p class="white text-center">Nếu chưa có, vui lòng nhập thông tin để tiếp tục đặt lịch khám.</p>
                    @endif   

                    <div class="col-md-6">
                        <div class="form-group" style="margin-top: 40px;">
                            <label for="" class="label-bottom text-left">Họ Tên: </label>
                            <input type="text" class="form-control br-radius-zero" name="fullname" required oninvalid="this.setCustomValidity('Vui lòng điền họ tên')"
        oninput="setCustomValidity('')" value="{{old('fullname')}}" <?php if(isset(Auth::guard('patient')->user()->username)) { echo "disabled";} ?> />
                        </div>
                        <div class="form-group">
                            <label for="" class="label-bottom">Điện thoại: </label>
                            <input type="text" class="form-control br-radius-zero" name="phone" required oninvalid="this.setCustomValidity('Vui lòng điền số điện thoại')"
        oninput="setCustomValidity('')" value="{{old('phone')}}" <?php if(isset(Auth::guard('patient')->user()->username)) { echo "disabled";} ?>/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" style="margin-top: 40px;">
                            <label for="" class="label-bottom">Email: </label>
                            
                            <input type="email" class="form-control br-radius-zero" name="email" required oninvalid="this.setCustomValidity('Vui lòng điền địa chỉ email')"
        oninput="setCustomValidity('')" value="{{old('email')}}" <?php if(isset(Auth::guard('patient')->user()->username)) { echo "disabled";} ?>/>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-bottom">Giới tính: </label>
                            
                            <select name="gender" class="form-control br-radius-zero" <?php if(isset(Auth::guard('patient')->user()->username)) { echo "disabled";} ?>>
                                <option value="1">Nam</option>
                                <option value="0" <?php if(old('gender') == 0) echo "selected";?>>Nữ</option>
                            </select>
                        </div>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger" id="report-appointment">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(isset(Auth::guard('patient')->user()->username)) 
                    <form action="{{asset('appointments')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <center><button type="submit" class="btn btn-appoint">Đặt lịch hẹn</button></center>
                    </form>
                    @else
                    <center><button type="submit" class="btn btn-appoint">Tiếp tục</button></center>
                    @endif
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

            setTimeout(function()
            {
            	  $('#report-appointment').fadeOut();
            },4000);
        });
    </script>
</body>

</html>