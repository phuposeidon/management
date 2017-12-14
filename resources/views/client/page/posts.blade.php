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
    <div class="container" style="background-color: #fff;">
      <!-- new post -->
      <div class="posts" style="border-top: #fff;">

        <div class="bread-crumb"><a href="{{asset('index')}}">Trang chủ</a> . <a href="">Bài viết</a></div>
        
        <div class="new-post row">
            <div class="col-md-8 img-npost">
                <a href="{{asset('post/'.$newPost->id.'#service')}}"><img src="{{asset('img/post/'.$newPost->avatar)}}" alt=""></a>
            </div>

            <div class="col-md-4">
                <a href="{{asset('post/'.$newPost->id.'#service')}}" class="title-npost">{{$newPost->name}}</a>
                <p class="content-npost text-justify">Ung thư thực quản là loại ung thư phổ biến và có tỉ lệ ngày 
                    càng tăng lên trong những năm gần đây. Theo thông tin từ trang blogsuckhoe 
                    cho biết: “Nếu như năm 2000 chỉ có hơn 800 ca ung thư thực quản thì sau 10 năm 
                    con số này đã tăng gấp 5 lần và hiện nay vẫn tăng lên”.</p>
            </div>
        </div>

        <ul class="new-post-list row">
          @foreach($allPosts as $npost)
          <li class="col-md-3 post-list">
              <a href="{{asset('post/'.$npost->id.'#service')}}">
                  <img src="{{asset('img/post/'.$npost->avatar)}}" alt="" class="img-listpost">
                  <p>{{$npost->name}}</p>
              </a>
          </li>
          @endforeach

          <!-- <li class="col-md-3 post-list">
              <a href="">
                  <img src="{{asset('img/img_1.jpg')}}" alt="" class="img-listpost">
                  <p>Dấu hiệu ung thư thực quản ở từng giai đoạn bệnh</p>
              </a>
          </li> -->

        </ul>
      </div>
      <!-- end new post -->
      
      @foreach($allCategories as $category)
      <div class="posts">
        <div class="bread-crumb"><a href="{{asset('cate/'.$category->id.'#service')}}" class="category-post">{{$category->name}}</a></div>

        <ul class="new-post-list row" style="margin-top: 0">
            <?php 
              $newCatePosts = App\Post::where('categoryId', $category->id)->orderBy('createdAt','desc')->take(2)->get();
              $newCatePostIds = [];
            ?>
            @foreach($newCatePosts as $catePost)
            <li class="col-md-5 post-list">
                <a href="{{asset('post/'.$catePost->id.'#service')}}">
                  <p>{{$catePost->name}}</p>
                  <div class="row show-list">
                    <div class="col-md-7">
                      <img src="{{asset('img/post/'.$catePost->avatar)}}" alt="" class="img-listpost">
                    </div>

                    <div class="col-md-5 text-justify">
                      <small>Bệnh lao phổi rất dễ xảy ra biến chứng trong quá trình điều trị do khuẩn lao khó kiểm soát 
                        và dễ dàng xâm nhập sâu hơn vào cơ thể bệnh nhân, gây ra các bệnh ...</small>
                    </div>
                  </div>
                  
                </a>
            </li>
            <?php $newCatePostIds[] = $catePost->id;?>
            @endforeach

            <?php $catePosts = App\Post::where('categoryId', $category->id)->whereNotIn('id', $newCatePostIds)->orderBy('createdAt','desc')->take(4)->get();?>
            <ul class="col-md-2 sub-list">
              @foreach($catePosts as $cpost)
              <li><a href="{{asset('post/'.$cpost->id.'#service')}}">{{$cpost->name}}</a></li>
              @endforeach
            </ul>
            
        </ul>

      </div>
      @endforeach

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