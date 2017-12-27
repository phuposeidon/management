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
              <h1 class="white">Đánh giá Bác sĩ</h1>
              <p>Nơi bệnh nhân đánh giá về ưu và nhược điểm của bác sĩ <br> Để các bệnh nhân khác có thể tham khảo trước khi đặt niềm tin vào chúng tôi.</p>
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
        <!--menu -->
        <div class="col-md-3">
            <div class="col-md-12">
                <ul class="blog-menu">
       
                    @foreach($specializations as $spe)
                    <li class="row cate-list">
                        <div class="col-md-8">
                            <a href="{{asset('doctors/'.$spe->id.'#service')}}"
                                @if($specialization->id == $spe->id)
                                    style="color: #00a2a2"
                                @endif
                            >{{$spe->name}}</a>
                        </div>
                        <div class="col-md-4 text-right">
                            <i class="fa fa-chevron-right" 
                                @if($specialization->id == $spe->id)
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
        <div class="col-md-9 post-content" style="background-color: transparent; border: none">
            <div class="row" style="margin-bottom: 2em">
                <div class="col-md-12">
                    <h2 class="ser-title">{{$specialization->name}}</h2>
                    <hr class="botm-line">
                </div>

                @foreach($topDoctors as $doc)
                <div class="col-md-4 col-sm-4 col-xs-8">
                    <div class="thumbnail"  style="height: 400px">
                        <img src="{{asset('img/user/'.$doc->avatar)}}" alt="..." class="team-img" style="height:245px; width:245px">
                        <div class="caption">
                            <h3>{{$doc->fullname}}</h3>
                            <p>{{$doc->userType}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

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
        //$('#myNavbar ul .postsBtn').addClass('active');
      
        
      });
    </script>
  </body>

</html>