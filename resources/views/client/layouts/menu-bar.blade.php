    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{asset('index')}}">Trang chủ</a></li>
                <li class=""><a href="#service">Dịch vụ</a></li>
                <li class=""><a href="#about">Thông tin</a></li>
                <li class=""><a href="#testimonial">Đánh giá</a></li>
                <li class=""><a href="#contact">Liên hệ</a></li>
                <li class=""><a href="{{asset('posts')}}">Bài viết</a></li>
                @if(isset(Auth::guard('patient')->user()->username))

                <?php 
                  $nextAppointment = App\MedicalRecord::where('patientId', Auth::guard('patient')->user()->id)->select('appoimentDate')->orderBy('createdAt', 'desc')->first();
                  $date1 = new DateTime($nextAppointment['appoimentDate']);
                  $date2 = new DateTime(Carbon\Carbon::today());
                  $a = date_diff($date1, $date2);
                  $diff = $a->format('%R%a');
                ?>
                @if($nextAppointment != '' && $diff < 0)
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                  <!-- <a href="">Lịch khám</a> -->
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                    Lịch khám
                    <span class="badge badge-default badge-custom"> </span>
                  </a>
                  <ul class="dropdown-menu menudrop" style="min-width: 300px; padding: 14px;">
                    <li style="color: #fff"> Lịch khám tiếp theo của bạn: {{Carbon\Carbon::Parse($nextAppointment['appoimentDate'])->format('d-m-Y')}}</li>
                  </ul>
                </li>
                @endif
                <li class="bookingBtn"><a href="{{asset('appointment-login')}}">Đặt lịch</a></li>
                <li class=""><a href="{{asset('blog')}}">Hỏi / Đáp</a></li>
                <?php
                  $pieces = explode(' ', Auth::guard('patient')->user()->fullname);
                  $last_name = array_pop($pieces);
                ?>
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Xin chào, {{$last_name}} <span class="caret"></span></a>
                  <ul class="dropdown-menu menudrop">
                    <li class="menu-list"><a href="{{asset('user-info')}}">Thông tin cá nhân</a></li>
                    <li class="menu-list"><a href="{{asset('plogout')}}">Đăng xuất</a></li>
                  </ul>
                </li>
                @else
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Tài khoản</a>
                  <ul class="dropdown-menu menudrop">
                    <li class="menu-list"><a href="#sign-in" data-toggle="modal">Đăng nhập</a></li>
                    <li class="menu-list"><a href="{{asset('signup')}}">Đăng ký</a></li>
                  </ul>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </nav>
      @include('client.page.login')