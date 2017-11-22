<!--footer-->
<footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Về chúng tôi</h4>
            </div>
            <div class="info-sec">
              <p>Praesent convallis tortor et enim laoreet, vel consectetur purus latoque penatibus et dis parturient.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Liên kết</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.html"><i class="fa fa-circle"></i>Trang chủ</a></li>
                <li><a href="#service"><i class="fa fa-circle"></i>Dịch vụ</a></li>
                <li><a href="#contact"><i class="fa fa-circle"></i>Đặt lịch</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Theo dõi chúng tôi</h4>
            </div>
            <div class="info-sec">
              <ul class="social-icon">
                <li class="bglight-blue"><i class="fa fa-facebook"></i></li>
                <li class="bgred"><i class="fa fa-google-plus"></i></li>
                <li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>
                <li class="bglight-blue"><i class="fa fa-twitter"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->

  <script src="client/js/jquery.min.js"></script>
  <script src="client/js/jquery.easing.min.js"></script>
  <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="client/js/bootstrap.min.js"></script>
  <script src="client/js/custom.js"></script>
  <script src="client/contactform/contactform.js"></script>
  <script type="text/javascript">
      $(function () {
        $('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).on('changeDate', function (ev) {
          $(this).datepicker('hide');
      });
    })
  </script>
  <script>
    $(document).ready(function() {
        @if(session('thongbao'))
            $('#login-popup').modal('show');
        @endif
    });
</script>

