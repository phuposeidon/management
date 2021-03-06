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
                <li class="active indexBtn"><a href="{{asset('index')}}">Trang chủ</a></li>
                <li class="bookingBtn"><a href="{{asset('appointment-login')}}">Đặt lịch</a></li>
                <li class="askBtn"><a href="{{asset('blog')}}">Hỏi / Đáp</a></li>
                <li class="postsBtn"><a href="{{asset('posts')}}">Bài viết</a></li>
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