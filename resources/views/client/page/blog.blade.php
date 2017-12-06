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
          <h3 class="ser-title" style="margin-top: 30px;">Chuyên khoa</h3>
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
        
        <div class="col-md-9">
          <!-- post-answer -->
          <div class="service-info blog-border">
            <div class="row blog-content">
              <div class="col-md-1 avatar-user">
                <img src="" alt="">
              </div>
              <div class="col-md-11">
                <div class="title-question">
                  <i class="fa fa-question-circle"></i> Đặt câu hỏi
                </div>
                <div class="question">
                  <textarea name="" id="" rows="10" placeholder="Bạn muốn hỏi bác sĩ điều gì?"></textarea>
                </div>
              </div>
            </div>

            <div class="row blog-footer pad-10">
              <div class="col-md-offset-9 col-md-2">
                <input type="checkbox"> Đăng ẩn danh
              </div>
              <div class="col-md-1">
                <button class="btn-send">Gửi</button>
              </div>
            </div>
          </div>
          <!-- end post-answer -->
          <div class="service-info blog-border">
            <div class="row blog-content">
              <div class="user-info row">
                <div class="col-md-1 avatar-user"></div>
                <div class="col-md-10 about-user">
                  <p> <span class="name"> Nguyễn Văn A</span> <span> đã hỏi</span></p>
                  <small><span>15 phút</span> <span>Nam</span> <span>30 tuổi</span> <span>TP.HCM</span> </small>
                </div>
              </div>

              <div class="user-question row">
                <p>Bé 9 tháng tuổi bị nổi nhiểu hạch ở hai bên cổ, tình trạng bé đang bị viêm mũi kèm theo sốt. Cho hỏi bị nổi hạch như vậy có nguy hiểm không ah?</p>
              </div>
              <div class="btn-answser">
                <a href=""><i class="fa fa-thumbs-o-up fa-fw"></i> Thích</a>
                <a href=""><i class="fa fa-comment-o fa-fw"></i> Trả lời</a>
              </div>
            </div>

            <div class="blog-footer">

              <div class="user-answer row">
                <div class="avatar-user col-md-1"></div>
                <div class="col-md-11 pad-10">
                  <b>Nightbot</b>
                  <p>Chào bạn,

Tôi là Đô-rê-mon, robot tư vấn sức khỏe. Trong khi đợi các bác sĩ, chuyên gia và thành viên Cộng đồng ViCare trả lời câu hỏi của bạn, tôi vừa tìm thấy nội dung sau đây từ kho tàng các câu hỏi đáp và bài viết của ViCare. Bạn đọc thử xem nhé:

Thông tin đầy đủ về Bệnh Viêm xoang
Nếu thông tin này có ích cho bạn thì nhớ bấm "cảm ơn" tôi nha! Nếu bạn chưa hài lòng thì cũng trả lời cho tôi biết nhé. Tôi vẫn đang trong quá trình học hỏi để trở nên thông minh hơn và rất mong được nghe phản hồi của bạn.

Robot Đô-rê-mon xin cảm ơn!</p>
                </div>
              </div>

              <div class="post-answer row">
                <div class="avatar-user col-md-1"></div>
                <div class="col-md-11 answer">
                  <textarea name="" id="answer-box" rows="1" placeholder="Viết trả lời ..."></textarea>
                </div>
              </div>

            </div>
            
          </div>
          
        </div>
        
        
      </div>
    </div>
  </section>
  <!--/ service-->
  
  @include('client.layouts.footer')

    <script>
      $(document).ready(function () {
        //focus answer box
        $('#answer-box').click(function(){
          $(this).parent().css('height', '120px');
        });
      });
    </script>
  </body>

</html>