@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 banner-info-1">
            <div class="banner-text">
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="white text-center">Đánh giá bác sĩ</h1>

                    @if($errors->any())
                        <div class="alert alert-danger col-sm-12" id="report">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(Session::has('flash_message'))
                        <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="{{asset('img/user/'.$doctor->avatar)}}" alt="..." class="team-img" style="height: 260px; width: 260px">
                                <div class="caption">
                                    <h3>{{$doctor->fullname}}</h3>
                                    <p>{{$doctor->userType}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-offset-1 col-md-7">
                            <div class="form-group">
                                <ul class="doctor-info">
                                    <li class="doctor-list">
                                        <label for="" class="label-bottom">Chuyên Khoa: </label>
                                        <input type="text" class="form-control" value="{{$doctor->Specialization->name}}" disabled>
                                    </li>
                                    <li class="doctor-list">
                                        <label for="" class="label-bottom">Ngày sinh: </label>
                                        <input type="text" class="form-control" value="{{Carbon\Carbon::Parse($doctor->DOB)->format('d-m-Y')}}" disabled>
                                    </li>
                                    <li class="doctor-list">
                                        <label for="" class="label-bottom">Email: </label>
                                        <input type="text" class="form-control" value="{{$doctor->email}}" disabled>
                                    </li>
                                </ul>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-4 col-md-4">
                                    <div class="doctor-point
                                        @if($pointAvg <= 5)
                                        btn-danger
                                        @elseif($pointAvg < 8)
                                        btn-warning
                                        @else
                                        btn-success
                                        @endif
                                    ">
                                        <p class="point text-center" id="pointAvg">{{round($pointAvg, 2)}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="service" class="section-padding" style="background-color: #eee">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="list-feedback">

                    @foreach($allFeedbacks as $fb)
                    <!-- patient feedback -->
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="testi-details col-md-10">
                            <h4>{{$fb->title}}</h4>
                            <!-- Paragraph -->
                            <p>{!!$fb->content!!}</p>
                        </div>
                        <div class="col-md-2">
                            <div class="doctor-point
                                @if($fb->point <= 5)
                                btn-danger
                                @elseif($fb->point < 8)
                                btn-warning
                                @else
                                btn-success
                                @endif
                            " style="margin-top: 10px;height: 80px; width: 80px">
                                <p class="point text-center" style="margin-top: 35%;font-size: 35px;">{{$fb->point}}</p>
                            </div>
                        </div>
                        <div class="testi-info col-md-12">
                            <!-- User Image -->
                            <a><img src="
                                @if($fb->anonymous == 0)
                                    {{asset('img/patient/'.$fb->Patient->avatar)}}
                                @else
                                    {{asset('img/patient/user-default.png')}}
                                @endif
                            
                            " alt="" class="img-responsive"></a>
                            <!-- User Name -->
                            <h3>
                                @if($fb->anonymous == 0)
                                    {{$fb->Patient->fullname}} 
                                @else
                                    Bệnh nhân giấu tên
                                @endif
                                <small>{{Carbon\Carbon::Parse($fb->created)->format('d-m-Y H:i')}}</small>
                            </h3>
                        </div>
                    </div>
                    <!-- end patient feedback -->
                    @endforeach

                </div>
                <center>{{$allFeedbacks->fragment('service')->links()}}</center>

                <div class="contact-info" style="margin-top: 100px;">
                    <h3 class="cnt-ttl">Đóng góp ý kiến</h3>
                    <div class="space"></div>
                    <div id="sendmessage">Đã gửi thành công!</div>
                    <div id="errormessage"></div>
                    <!-- <form action="" method="post" role="form" class=""> -->
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="doctorId" value="{{$doctor->id}}">
                        <input type="hidden" name="patientId" value="{{Auth::guard('patient')->id()}}">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="testi-info">
                                    <!-- User Image -->
                                    <a><img src="{{asset('img/patient/'.Auth::guard('patient')->user()->avatar)}}" alt="" class="img-responsive"></a>
                                </div>
                            </div>

                            <div class="col-md-11">
                                <div class="form-group" style="width: 25%">
                                    <input type="number" name="point" class="form-control br-radius-zero tab-12" id="name" min="1" max="10" placeholder="Điểm" data-rule="min:0" data-msg="Vui lòng nhập điểm"  />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control br-radius-zero tab-12" name="subject" id="subject" placeholder="Tiêu đề" data-rule="required" data-msg="Vui lòng nhập tiêu đề" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control br-radius-zero tab-12" name="message" id="message" rows="5" data-rule="required" data-msg="Vui lòng nhập nội dung" placeholder="Nội dung"></textarea>
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <input type="checkbox" id="anonymous" name="anonymous"/> Đăng ẩn danh
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-action">
                            <center><button type="submit" class="btn btn-form sendFeedback">Đóng góp</button></center>
                        </div>
                    <!-- </form> -->
                </div>

            </div>
        </div>
    </div>
  </section>
    @include('client.layouts.footer')

    <script>
        $('document').ready(function() {
            //active menu bar
            $('#myNavbar ul .indexBtn').removeClass('active');

            //
            $( "#name" ).change(function() {
                var max = parseInt($(this).attr('max'));
                var min = parseInt($(this).attr('min'));
                if ($(this).val() > max)
                {
                    $(this).val(max);
                }
                else if ($(this).val() < min)
                {
                    $(this).val(min);
                }       
            });

            //ajax send feedback
            $('.sendFeedback').click(function (){
                _token = $('.contact-info input[name="_token"]').val();
                doctorId = $('.contact-info input[name="doctorId"]').val();
                patientId = $('.contact-info input[name="patientId"]').val();
                point = $('.contact-info input[name="point"]').val();
                anonymous = $('.contact-info input[name="anonymous"]').val();
                if ($('#anonymous').is(":checked"))
                {
                    anonymous = 1;
                }
                else anonymous = 0;
                subject = $('.contact-info input[name="subject"]').val();
                text = $('.contact-info textarea[name="message"]').val();
                content = text.replace(/\n\r?/g, '<br />');
                var posting = $.post({
                    url: '../ajax/feedback/patient-post',
                    type: "POST",
                    data: {_token:_token, doctorId: doctorId,
                            patientId: patientId, point: point, 
                            subject: subject ,content: content, anonymous: anonymous
                            }
                });
                posting.done(function(data){
                    var arr = jQuery.parseJSON(data);
                    var title = arr.title;
                    var point = arr.point;
                    var content = arr.content;
                    var createdAt = arr.createdAt;
                    var pointAvg = arr.pointAvg;
                    if(arr.anonymous == 1) {
                        image = "{{asset('img/patient/user-default.png')}}"
                        patient = "Bệnh nhân giấu tên";
                    }
                    else { 
                        image = "{{asset('img/patient/'.Auth::guard('patient')->user()->avatar)}}";
                        patient = arr.patient;
                    }
                    if(point <= 5) color = "btn-danger";
                    else if(point < 8) color = "btn-warning";
                    else color = "btn-success";

                    $('html, body').animate({
                        scrollTop: $("#service").offset().top
                    }, 2000);

                    $('.list-feedback').prepend(`
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="testi-details col-md-10">
                            <h4>`+title+`</h4>
                            <!-- Paragraph -->
                            <p>`+content+`</p>
                        </div>
                        <div class="col-md-2">
                            <div class="doctor-point `+color+`" style="margin-top: 10px;height: 80px; width: 80px">
                                <p class="point text-center" style="margin-top: 35%;font-size: 35px;">`+point+`</p>
                            </div>
                        </div>
                        <div class="testi-info col-md-12">
                            <!-- User Image -->
                            <a><img src="`+image+`" alt="" class="img-responsive"></a>
                            <!-- User Name -->
                            <h3>`+patient+` <small>`+createdAt+`</small></h3>
                        </div>
                    </div>
                    `);      
                    $('#pointAvg').text(pointAvg);  
                    if(pointAvg <= 5) color = "btn-danger";
                    else if(pointAvg < 8) color = "btn-warning";
                    else color = "btn-success";   
                    $('#pointAvg').parent().addClass(color);        
                    $('.contact-info input[name="point"]').val('');
                    $('.contact-info input[name="subject"]').val('');
                    $('.contact-info textarea[name="message"]').val('');
                    $('#anonymous').attr('checked', false);
                    
                });
            });


        });
    </script>
</body>

</html>