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
        <div class="col-md-4">
            <div class="blog-border col-md-12">
                <h3 class="ser-title" style="margin-top: 30px;">Chuyên mục</h3>
                <hr class="botm-line">
                <ul class="blog-menu">
                    
                    <li class="row blog-list">
                        <div class="col-md-8">
                            <a href="{{asset('posts#service')}}">Tất cả</a>
                        </div>
                        <div class="col-md-4 text-right">
                            <i class="fa fa-comments"> 15 </i> <!-- count(App\Question::get()) -->
                            
                        </div>
                    </li>
                    <!-- foreach($specializations as $spe) -->
                    <li class="row blog-list">
                        <div class="col-md-8">
                            <a href="">Y tế</a>
                            <!-- $spe->name -->
                        </div>
                        <div class="col-md-4 text-right">
                            <i class="fa fa-comments"> 15 </i>
                            <!-- count(App\Question::where('specializationId', $spe->id)->get()) -->
                        </div>
                    </li>
                    <li class="row blog-list">
                        <div class="col-md-8">
                            <a href="">Y tế</a>
                            <!-- $spe->name -->
                        </div>
                        <div class="col-md-4 text-right">
                            <i class="fa fa-comments"> 15 </i>
                            <!-- count(App\Question::where('specializationId', $spe->id)->get()) -->
                        </div>
                    </li>
                    <li class="row blog-list">
                        <div class="col-md-8">
                            <a href="">Y tế</a>
                            <!-- $spe->name -->
                        </div>
                        <div class="col-md-4 text-right">
                            <i class="fa fa-comments"> 15 </i>
                            <!-- count(App\Question::where('specializationId', $spe->id)->get()) -->
                        </div>
                    </li>
                    <!-- endforeach -->
                </ul>
            </div>

            <div class="blog-border  col-md-12" style="margin-top: 30px;">
                <h3 class="ser-title" style="margin-top: 30px;">Bài viết nổi bật</h3>
                <hr class="botm-line">
                <ul class="blog-menu">
                    
                    <li class="row blog-list">
                        <div class="col-md-1 avatar-post">
                            <img src="{{asset('img/patient/user-default.png')}}" alt="">
                        </div>
                        <div class="col-md-10 title-post">
                            <a><b>Ngày hội tư vấn dinh dưỡng và tiêm chủng đang diễn ra trên Medilab</b></a>
                            <p><small> Xã hội ngày càng phát triển, cùng với đó chất lượng y...</small></p>
                        </div>
                    </li>
                    <!-- foreach($specializations as $spe) -->
                    <li class="row blog-list">
                        <div class="col-md-1 avatar-post">
                            <img src="{{asset('img/patient/user-default.png')}}" alt="">
                        </div>
                        <div class="col-md-10 title-post">
                            <a><b>Ngày hội tư vấn dinh dưỡng và tiêm chủng đang diễn ra trên Medilab</b></a>
                            <p><small> Xã hội ngày càng phát triển, cùng với đó chất lượng y...</small></p>
                        </div>
                    </li>
                    <li class="row blog-list">
                        <div class="col-md-1 avatar-post">
                            <img src="{{asset('img/patient/user-default.png')}}" alt="">
                        </div>
                        <div class="col-md-10 title-post">
                            <a><b>Ngày hội tư vấn dinh dưỡng và tiêm chủng đang diễn ra trên Medilab</b></a>
                            <p><small> Xã hội ngày càng phát triển, cùng với đó chất lượng y...</small></p>
                        </div>
                    </li>
                    <li class="row blog-list">
                        <div class="col-md-1 avatar-post">
                            <img src="{{asset('img/patient/user-default.png')}}" alt="">
                        </div>
                        <div class="col-md-10 title-post">
                            <a><b>Ngày hội tư vấn dinh dưỡng và tiêm chủng đang diễn ra trên Medilab</b></a>
                            <p><small> Xã hội ngày càng phát triển, cùng với đó chất lượng y...</small></p>
                        </div>
                    </li>
                    <!-- endforeach -->
                </ul>
            </div>

        </div>
        <!-- end menu -->
        
        <div class="col-md-8 post-content">
            <h1>Title post</h1>
            <small>
                <span><i class="fa fa-user"></i> Tên người post</span>
                <span style="padding-left: 30px"><i class="fa fa-calendar"></i>  12/12/2017</span>
                <span style="padding-left: 30px"><i class="fa fa-eye"></i>  12</span>
            </small>
            <p class="txt-post text-justify">Với chế độ ăn ngày càng đa dạng như hiện này, nhiều người thường gặp các bệnh liên quan đến đường tiêu hóa. Trào ngược axit dạ dày, bị loét dạ dày tá tràng, mắc hội chứng ruột kích thích và bệnh không dung nạp lactose...là các bệnh tiêu hóa thường gặp ở người trưởng thành.</p>

            <ul class="list-url">
                <li class="sub-url">
                    <a href="">Bài viết A</a>
                </li>
                <li class="sub-url">
                    <a href="">Bài viết A</a>
                </li>
                <li class="sub-url">
                    <a href="">Bài viết A</a>
                </li>
                <li class="sub-url">
                    <a href="">Bài viết A</a>
                </li>
                <li class="sub-url">
                    <a href="">Bài viết A</a>
                </li>
            </ul>
        </div>
        
        
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