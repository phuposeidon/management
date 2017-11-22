@include('client.layouts.header')

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      
      @include('client.layouts.menu-bar')
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="client/img/logo.png" class="img-responsive">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">Chăm sóc sức khỏe ngay tại bàn!!</h1>
              <p>Cung cấp dịch vụ chăm sóc sức khỏe chuyên nghiệp và tận tình<br>Tất cả vì sức khỏe của bạn và người thân.</p>
              @if(isset(Auth::guard('patient')->user()->username))
              <a href="{{asset('appointments')}}" class="btn btn-appoint">Đặt lịch hẹn</a>
              @else
              <a href="{{asset('appointment-login')}}" class="btn btn-appoint">Đặt lịch hẹn</a>
              @endif
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Dịch vụ</h2>
          <hr class="botm-line">
          <p>Dịch vụ khám chữa bệnh đa dạng, </p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <div class="icon-info">
              <h4>Hỗ trợ 24H</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-ambulance"></i>
            </div>
            <div class="icon-info">
              <h4>Dịch vụ cấp cứu</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <div class="icon-info">
              <h4>Tư vấn tận tình</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="icon-info">
              <h4>Chăm sóc tận tâm</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ service-->
  <!--cta-->
  <section id="cta-1" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="schedule-tab">
          <div class="col-md-4 col-sm-4 bor-left">
            <div class="mt-boxy-color"></div>
            <div class="medi-info">
              <h3>Trường hợp khẩn cấp</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <a href="#" class="medi-info-btn">CHI TIẾT</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="medi-info">
              <h3>Trường hợp khẩn cấp</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <a href="#" class="medi-info-btn">CHI TIẾT</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 mt-boxy-3">
            <div class="mt-boxy-color"></div>
            <div class="time-info">
              <h3>Giờ mở cửa</h3>
              <table style="margin: 8px 0px 0px;" border="1">
                <tbody>
                  <tr>
                    <td>Thứ 2 - Thứ 6</td>
                    <td>8.00 - 17.00</td>
                  </tr>
                  <tr>
                    <td>Thứ 7</td>
                    <td>9.30 - 17.30</td>
                  </tr>
                  <tr>
                    <td>Chủ nhật</td>
                    <td>9.30 - 15.00</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--about-->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="section-title">
            <h2 class="head-title lg-line"> Medilap cụm Phòng khám hàng đầu VN</h2>
            <hr class="botm-line">
            <p class="sec-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
            <a href="" style="color: #0cb8b6; padding-top:10px;">Know more..</a>
          </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12">
          <div style="visibility: visible;" class="col-sm-9 more-features-box">
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>Những điều cần biết về phòng khám</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.</p>
              </div>
            </div>
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>Những điều cần biết về phòng khám</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ about-->
  <!--doctor team-->
  <section id="doctor-team" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Đội ngũ bác sĩ hàng đầu</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="client/img/doctor1.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Jessica Wally</h3>
              <p>Bác sĩ</p>
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="client/img/doctor2.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Iai Donas</h3>
              <p>Bác sĩ</p>
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="client/img/doctor3.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Amanda Denyl</h3>
              <p>Bác sĩ</p>
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="client/img/doctor4.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Jason Davis</h3>
              <p>Bác sĩ</p>
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ doctor team-->
  <!--testimonial-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">cảm nhận của bệnh nhân</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="client/img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="client/img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="client/img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ testimonial-->
  <!--cta 2-->
  <section id="cta-2" class="section-padding">
    <div class="container">
      <div class=" row">
        <div class="col-md-2"></div>
        <div class="text-right-md col-md-4 col-sm-4">
          <h2 class="section-title white lg-line">« Về chúng tôi »</h2>
        </div>
        <div class="col-md-4 col-sm-5">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typek
          <p class="text-right text-primary"><i>— Medilap Healthcare</i></p>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--contact-->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Liên hệ</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <h3>Thông tin liên lạc</h3>
          <div class="space"></div>
          <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>321 Đường 123<br> Phường 1, Quận Thủ Đức, TP.HCM</p>
          <div class="space"></div>
          <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@medilap.com</p>
          <div class="space"></div>
          <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>08 08 08 08</p>
        </div>
        <div class="col-md-8 col-sm-8 marb20">
          <div class="contact-info">
            <h3 class="cnt-ttl">Đóng góp ý kiến</h3>
            <div class="space"></div>
            <div id="sendmessage">Đã gửi thành công!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Họ tên" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Địa chỉ Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="subject" id="subject" placeholder="Tiêu đề" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Nội dung"></textarea>
                <div class="validation"></div>
              </div>

              <div class="form-action">
                <button type="submit" class="btn btn-form">Đóng góp</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ contact-->
  @include('client.layouts.footer')
  </body>

</html>