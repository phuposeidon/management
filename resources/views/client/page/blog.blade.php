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
              <h1 class="white">Hỏi đáp cùng bác sĩ</h1>
              <p>Nơi bạn đặt ra những câu hỏi, vấn đề bạn và người thân mắc phải<br>Đội ngũ y sĩ của chúng tôi sẽ sẵn sàng trả lời.</p>
              @if(isset(Auth::guard('patient')->user()->username))
              <form action="{{asset('appointments')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-appoint">Đặt lịch hẹn</button>
              </form>
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
  <section id="service" class="section-padding section-color">
    <div class="container">
      <div class="row">
        <!--menu -->
        <div class="col-md-3 blog-border">
          <h2 class="ser-title" style="margin-top: 30px;">Các chuyên khoa</h2>
          <hr class="botm-line">
          <ul class="blog-menu">
            <li class="row blog-list">
                <div class="col-md-8">
                    <a href="">Tai - Mũi - Họng</a>
                </div>
                <div class="col-md-4 text-right">
                    <i class="fa fa-comment"> 15</i>
                </div>
            </li>
            <li class="row blog-list">
                <div class="col-md-8">
                    <a href="">Răng - Hàm - Mặt</a>
                </div>
                <div class="col-md-4 text-right">
                    <i class="fa fa-comment"> 15</i>
                </div>
            </li>
            <li class="row blog-list">
                <div class="col-md-8">
                    <a href="">Cơ Xương Khớp</a>
                </div>
                <div class="col-md-4 text-right">
                    <i class="fa fa-comment"> 15</i>
                </div>
            </li>
            
          </ul>
        </div>
        <!-- end menu -->
        
        <div class="col-md-8">
          <!-- post-answer -->
          <div class="service-info blog-border blog-content">
            <div class="icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <div class="icon-info">
              <h4>Hỗ trợ 24H</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <!-- end post-answer -->
          <div class="service-info blog-border blog-content">
            <div class="icon">
              <i class="fa fa-ambulance"></i>
            </div>
            <div class="icon-info">
              <h4>Dịch vụ cấp cứu</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          
        </div>
        
        
      </div>
    </div>
  </section>
  <!--/ service-->
  
  @include('client.layouts.footer')
  </body>

</html>