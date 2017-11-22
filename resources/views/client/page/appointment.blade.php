@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-4 col-md-4 banner-info-1">
            <div class="banner-text text-center">
                <form action="">
                    <h1 class="white">Đặt lịch khám </h1>

                    <div class="form-group" style="margin-top: 40px;">
                        <label for="" class="label-bottom">Chọn loại bệnh: </label>
                        <select name="" id="" class="form-control br-radius-zero">
                            <option value="">Tai Mũi Họng</option>
                            <option value="">Răng Hàm Mặt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-bottom">Chọn bác sĩ: </label>
                        <select name="" id="" class="form-control br-radius-zero">
                            <option value="">Bác sĩ bất kỳ</option>
                            <option value="">Nguyễn Văn A</option>
                            <option value="">Nguyễn Văn B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-bottom">Chọn ngày khám: </label>
                        <input type="text" class="form-control br-radius-zero datepicker" name="" />
                        
                    </div>

                    <!-- <button type="submit" class="btn btn-appoint">Chọn giờ</button> -->
                    <a href="{{asset('hours')}}" class="btn btn-appoint">Chọn giờ</a>
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
            $('#myNavbar ul .bookingBtn').addClass('active');
        });
    </script>
</body>

</html>