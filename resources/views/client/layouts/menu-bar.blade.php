    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="client/img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{asset('index')}}">Trang chủ</a></li>
                <li class=""><a href="#service">Dịch vụ</a></li>
                <li class=""><a href="#about">Thông tin</a></li>
                <li class=""><a href="#testimonial">Đánh giá</a></li>
                <li class=""><a href="#contact">Liên hệ</a></li>
                @if(isset(Auth::guard('patient')->user()->username))
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