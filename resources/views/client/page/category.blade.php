@include('client.layouts.header')

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="{{asset('client/img/logo.png')}}" class="img-responsive">
            </div>
            <div class="banner-text text-center">
                <h1 class="white">Lời khuyên Bác sĩ</h1>
                <p>Nơi đội ngũ bác sĩ của chúng tôi chia sẽ kinh nghiệm, kiến thức <br> Để bạn và người thân có thể phòng và chữa bệnh tại nhà.</p>
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
        <div class="col-md-3">
            <div class="col-md-12">
                <ul class="blog-menu">
       
                    @foreach($allCategories as $cate)
                    <li class="row cate-list">
                        <div class="col-md-8">
                            <a href="{{asset('cate/'.$cate->id.'#service')}}"
                                @if($category->id == $cate->id)
                                    style="color: #00a2a2"
                                @endif
                            >{{$cate->name}}</a>
                        </div>
                        <div class="col-md-4 text-right">
                            <i class="fa fa-chevron-right" 
                                @if($category->id == $cate->id)
                                    style="color: #00a2a2"
                                @endif
                            ></i>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <!-- end menu -->
        
        @if(isset($newPost))
        <div class="col-md-9 post-content">
            <div class="new-post row" style="height: 400px;">
                <div class="col-md-8 img-npost">
                    <a href="{{asset('post/'.$newPost->id.'#service')}}"><img src="{{asset('img/post/'.$newPost->avatar)}}" alt="" style="height: 75%;"></a>
                </div>

                <div class="col-md-4">
                    <a href="{{asset('post/'.$newPost->id.'#service')}}" class="title-npost">{{$newPost->name}}</a>
                    <p class="content-npost text-justify">Ung thư thực quản là loại ung thư phổ biến và có tỉ lệ ngày 
                        càng tăng lên trong những năm gần đây. Theo thông tin từ trang blogsuckhoe 
                        cho biết: “Nếu như năm 2000 chỉ có hơn 800 ca ung thư thực quản thì sau 10 năm 
                        con số này đã tăng gấp 5 lần và hiện nay vẫn tăng lên”.</p>
                </div>
            </div>

            <ul class="cate-posts">
                @foreach($allPosts as $post)
                <li class="cate-post">
                    <a href="{{asset('post/'.$post->id.'#service')}}">
                        <div class="row">
                            <div class="col-md-4 cate-post-img">
                                <img src="{{asset('img/post/'.$post->avatar)}}" alt="">
                            </div>
                            <div class="col-md-8">
                                <p class="cate-title">{{$post->name}}</p>
                                <small>Bệnh lao phổi rất dễ xảy ra biến chứng trong quá trình điều trị do khuẩn lao khó kiểm soát 
                        và dễ dàng xâm nhập sâu hơn vào cơ thể bệnh nhân, gây ra các bệnh ...</small>
                            </div>
                        </div>
                        
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
        @else 
        <div class="col-md-9 post-content">
            <h3>Chưa có bài viết nào</h3>
        </div>
        @endif       
        
      </div>
    </div>
  </section>
  <!--/ service-->
  
  @include('client.layouts.footer')

    <script>
      $(document).ready(function () {
        //active menu bar
        $('#myNavbar ul .indexBtn').removeClass('active');
        $('#myNavbar ul .postsBtn').addClass('active');
      
        
      });
    </script>
  </body>

</html>