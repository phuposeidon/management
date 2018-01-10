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
              <p class="text-justify">Với tâm nguyện phục vụ cho bệnh nhân một cách tốt nhất, phòng khám của chúng tôi sở hữu một đội ngũ y sĩ có chuyên môn, tận tâm với nghề, luôn phục vụ người bệnh với phương châm "Lương y như từ mẫu".</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Liên kết</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="{{asset('index')}}"><i class="fa fa-circle"></i>Trang chủ</a></li>
                <li><a href="#service"><i class="fa fa-circle"></i>Dịch vụ</a></li>
                <li><a href="{{asset('appointment-login')}}"><i class="fa fa-circle"></i>Đặt lịch</a></li>
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

  <script src="{{ asset('client/js/jquery.min.js') }}"></script>
  <script src="{{ asset('client/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('client/js/custom.js') }}"></script>
  <script src="{{ asset('client/contactform/contactform.js') }}"></script>
  <script type="text/javascript" language="javascript" src="{{asset('ckeditor/ckeditor.js')}}" ></script>
  <script src="{{ asset('global/plugins/bootstrap-summernote/summernote.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('global/scripts/app.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/scripts/components-editors.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
      $(function () {
        $('.datepicker').datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true, changeYear: true,  }).on('changeDate', function (ev) {
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


