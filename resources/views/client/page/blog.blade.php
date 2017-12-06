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
        <div class="col-md-3 blog-border">
          <h3 class="ser-title" style="margin-top: 30px;">Chuyên khoa</h3>
          <hr class="botm-line">
          <ul class="blog-menu">
            
            <li class="row blog-list">
                <div class="col-md-8">
                    <a href="{{asset('blog#service')}}">Tất cả</a>
                </div>
                <div class="col-md-4 text-right">
                    <i class="fa fa-comments"> {{count(App\Question::get())}}</i>
                </div>
            </li>
            @foreach($specializations as $spe)
            <form action="{{URL::action('PageController@getBlog')}}" method="get" id="sortForm{{$spe->id}}">
              <input type="hidden" name="specializationId" value="{{$spe->id}}">
              <li class="row blog-list">
                  <div class="col-md-8">
                      <a href="javascript:{}" onclick="document.getElementById('sortForm{{$spe->id}}').submit();">{{$spe->name}}</a>
                  </div>
                  <div class="col-md-4 text-right">
                      <i class="fa fa-comments"> {{count(App\Question::where('specializationId', $spe->id)->get())}}</i>
                  </div>
              </li>
            </form>
            @endforeach
          </ul>
        </div>
        <!-- end menu -->
        
        <div class="col-md-9">
          <form action="{{asset('blog')}}" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="patientId" value="@if(Auth::guard('patient')->check()) {{Auth::guard('patient')->user()->id}} @endif">
            <!-- post-question -->
            <div class="service-info blog-border">
              <div class="row blog-content">
                <div class="col-md-1 avatar-user">
                  <img src="{{asset('img/patient/'.Auth::guard('patient')->user()->avatar)}}" alt="">
                </div>
                <div class="col-md-11">
                  <div class="title-question">
                    <i class="fa fa-question-circle"></i> Đặt câu hỏi
                  </div>
                  <div class="question">
                    <textarea class="" name="content"  rows="10" placeholder="Bạn muốn hỏi bác sĩ điều gì?"></textarea>
                  </div>

                  <div class="question-pic" id="gallery"></div>

                  <button type="button" class="btn btn-danger" id="del-btn"><i class="fa fa-trash-o"></i></button>
                </div>
              </div>

              <div class="row blog-footer pad-10">
                <div class="col-md-3">
                  <select name="specializationId" class="form-control">
                    @foreach($specializations as $spe)
                    <option value="{{$spe->id}}">{{$spe->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-offset-5 col-md-1 image-upload">
                  <center> 
                    <label for="gallery-photo-add">
                      <i class="fa fa-camera"> </i> 
                    </label>
                  </center>
                  <input type="file" id="gallery-photo-add" name="image[]"  multiple="">
                            
                </div>
                
                <div class="col-md-2">
                  <input type="checkbox" name="anonymous"> Đăng ẩn danh
                </div>
                <div class="col-md-1">
                  <button type="submit" class="btn-send">Gửi</button>
                </div>
              </div>
            </div>
            <!-- end post-question -->
          </form>

          @foreach($questions as $question)
          <!-- posted question -->
          <div class="service-info blog-border" id="post-{{$question->id}}">
            <div class="row blog-content">
              <div class="user-info row">
                <div class="col-md-1 avatar-user"><img src="@if($question->anonymous == 0){{asset('img/patient/'.$question->Patient->avatar)}} @else {{asset('img/patient/user-default.png')}} @endif" alt=""></div>
                <div class="col-md-10 about-user">
                  <p> 
                    <span class="name">
                      @if($question->anonymous == 1)
                      Thành viên giấu tên
                      @else
                      {{$question->Patient->fullname}}
                      @endif
                    </span> 
                    <span> đã hỏi</span>
                  </p>
                  <small>
                    <span>
                      @if(Carbon\Carbon::today()->format('Y-m-d') == Carbon\Carbon::Parse($question->createdAt)->format('Y-m-d'))
                        Hôm nay, {{Carbon\Carbon::Parse($question->createdAt)->format('H:i')}}
                      @elseif(Carbon\Carbon::yesterday()->format('Y-m-d') == Carbon\Carbon::Parse($question->createdAt)->format('Y-m-d'))
                        Hôm qua, {{Carbon\Carbon::Parse($question->createdAt)->format('H:i')}}
                      @else
                        {{Carbon\Carbon::Parse($question->createdAt)->format('d-m-Y H:i')}}
                      @endif
                    </span> 
                    <span>@if($question->Patient->gender == 1)
                      Nam
                      @else
                      Nữ
                      @endif
                    </span> 
                    <span>
                      <?php $date = new DateTime($question->Patient->DOB);
                            $now = new DateTime();
                            $interval = $now->diff($date); 
                            echo $interval->y;      
                      ?> tuổi
                    </span> 
                  </small>
                </div>
              </div>

              <div class="user-question row">
                <p class="text-justify">{!!$question->content!!}</p>
              </div>

              <div class="question-pic">
                <ul class="list-pic">
                  <?php $questionImgs = App\QuestionImage::where('questionId', $question->id)->get();?>
                  @foreach($questionImgs as $img)
                  <li class="picture"><img src="{{asset('img/questionimage/'.$question->id.'/'.$img->url)}}"></li>
                  @endforeach
                </ul>
              </div>

              <!-- The Modal -->
              <div id="pic-modal" class="modal1">
                <span class="close1">&times;</span>
                <img class="modal-content1" id="img01">
                <div id="caption"></div>
              </div>

              <div class="qt-tags">
                <a href="" class="btn-tag">{{$question->Specialization->name}}</a>
              </div>

              <div class="btn-answer">
                <?php 
                  $ptId = Auth::guard('patient')->user()->id;
                  $qtId = $question->id;
                  $like = App\Like::where('patientId',$ptId)->where('questionId', $qtId)->get();
                ?>
                @if(!isset($like[0]))
                <form action="{{asset('like')}}" method="post" id="likeform{{$question->id}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="patientId" value="{{Auth::guard('patient')->user()->id}}">
                  <input type="hidden" name="questionId" value="{{$question->id}}">
                  
                </form>
                @endif
                <a class="like
                  @if(isset($like[0]))
                  like-selected
                  @endif
                " id="{{$question->id}}">
                  <i class="fa fa-thumbs-o-up fa-fw"></i> 
                  @if(isset($like[0]))
                  Đã Thích
                  @else
                  Thích
                  @endif
                </a>
                <a id="reply-post-{{$question->id}}" class="qt-reply"><i class="fa fa-comment-o fa-fw"></i> Trả lời</a>
              </div>
            </div>
            
            <?php $answers = App\Answer::where('questionId', $question->id)->get()?>

            <!-- blog footer -->
            <div class="blog-footer">

              <div class="count-like pad-10">
                <i class="fa fa-thumbs-o-up fa-fw"></i><a id="question-like-{{$question->id}}">{{count(App\Like::where('questionId', $question->id)->get())}}</a>
                <i class="fa fa-comment-o fa-fw"></i><a id="question-reply-{{$question->id}}"> {{count($answers)}}</a>
              </div>

              <div class="more-detail pad-10"><a> Xem tất cả {{count($answers)}} trả lời... </a></div>

              <div id="question-{{$question->id}}" style="margin-top: 10px; ">
                
                @foreach($answers as $answer)
                <!-- user comment -->
                <div class="user-answer blog-content row">
                  <div class="avatar-user col-md-1"><img src="@if(isset($answer->Patient->fullname)) {{asset('img/patient/'.$answer->Patient->avatar)}} @else {{asset('img/user/'.$answer->User->avatar)}} @endif" alt=""></div>
                  <div class="col-md-11 pad-10">
                    @if(isset($answer->Patient->fullname))
                    <b>{{$answer->Patient->fullname}}</b>
                    @else
                    <b><i class="fa fa-user-md" style="color: #5cb85c; font-size: 25px"></i> Bác sĩ {{$answer->User->fullname}}</b>
                    @endif
                    <p class="text-justify">{!!$answer->content!!}</p>
                  </div>
                </div>
                <!-- end user comment -->
                @endforeach
              </div>
            

              <!-- write comment -->
              <!-- <form action="{{asset('blog1')}}" method="post"> -->
              <div class="answerForm" id="af-{{$question->id}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="patientId" value="{{Auth::guard('patient')->user()->id}}">
                <input type="hidden" name="questionId" value="{{$question->id}}">
                <div class="post-answer blog-content row">
                  <div class="avatar-user col-md-1"><img src="{{asset('img/patient/'.Auth::guard('patient')->user()->avatar)}}" alt=""></div>
                  <div class="col-md-10 answer">
                    <textarea name="content" id="answer-box-{{$question->id}}" rows="1" placeholder="Viết trả lời ..."></textarea>
                  </div>
                  <div class="col-md-1" style="padding: 8px">
                    <center><button type="submit" id="f-{{$question->id}}" class="btn btn-success sendAnswer">Gửi</button></center>
                  </div>
                </div>
              </div>
              <!-- </form> -->
              <!-- end write comment -->

            </div>
            <!-- end blog footer -->
            
          </div>
          <!-- end posted question -->
          @endforeach

          <center>{{$questions->links()}}</center>
          
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
        $('#myNavbar ul .askBtn').addClass('active');
      
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
      
          if (input.files) {
              var filesAmount = input.files.length;

              for (i = 0; i < filesAmount; i++) {
                  var reader = new FileReader();

                  reader.onload = function(event) {
                      $($.parseHTML('<img>')).attr('src', event.target.result).addClass('input-image').appendTo(placeToInsertImagePreview);
                  }

                  reader.readAsDataURL(input.files[i]);
              }
          }

        };
        
        $('#del-btn').hide();

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div#gallery');
            if(this.files.length > 0)
            {
              $('#del-btn').show();
            }
        });
        
        //save line break textarea
        $('.btn-send').click(function() {
          var text = $('.question textarea').val();
          text = text.replace(/\n\r?/g, '<br />');
          $('.question textarea').val(text);
        });
        
        //delete all image select
        $('#del-btn').click(function () {
          $('#gallery-photo-add').val('');
          $('.input-image').fadeOut();
          $('#del-btn').hide();
        });
        
        //show less reply //'#post-' + id
        $('[id*="post-"]').each(function(){
          md = $(this).find('.more-detail');
          md.hide();
          if($(this).find('.blog-footer [id*="question-"] .user-answer').length > 2) {
            $(this).find('.blog-footer [id*="question-"] .user-answer').slice(0, ( $(this).find('.blog-footer [id*="question-"] .user-answer').length - 2)).hide();
            md.show();
          
            $('.more-detail').click(function () {
              id = $(this).parent().parent().attr('id');
              $(this).hide();
              $('#' +id + ' .blog-footer [id*="question-"] .user-answer').fadeIn();
            });

          }
        });

        //focus reply //'#reply-post-' + id
        $('.qt-reply').click(function () {
          id = $(this).attr('id');
          questionId = id.substring(12,11);
          $('#answer-box-'+ questionId).focus();
        });

        //picture comment modal
        $('.picture img').click(function(){
          
          $('nav').hide();
          $('#pic-modal').css('display','block');
          $('#img01').attr('src', $(this).attr('src'));
        });
        // Get the <span> element that closes the modal
        $('span.close1').click(function() {
          $('#pic-modal').css('display','none');
          $('nav').show();
        });

        //like selected
        $('.btn-answer .like').click(function () {
          questionId = $(this).attr('id');
          if($(this).hasClass('like-selected')) {}
          else {
            $(this).addClass('like-selected').html('<i class="fa fa-thumbs-o-up fa-fw"></i> Đã Thích');
            $.post( "../public/like", $( "#likeform"+questionId ).serialize() );
            likenum = parseInt($('#question-like-'+questionId).text()) + 1;
            $('#question-like-'+questionId).text(likenum);
          }
        });

        //ajax send answer
        $('.sendAnswer').click(function (){
            id = $(this).attr('id');
            _token = $('#a'+id+' input[name="_token"]').val();
            patientId = $('#a'+id+' input[name="patientId"]').val();
            questionId = $('#a'+id+' input[name="questionId"]').val();
            text = $('#a'+id+' textarea[name="content"]').val();
            content = text.replace(/\n\r?/g, '<br />');
            var posting = $.post({
                url: 'ajax/question/patient-post',
                type: "POST",
                data: {_token:_token, patientId: patientId, questionId: questionId, content: content}
            });
            posting.done(function(data){
                var arr = jQuery.parseJSON(data);
                var questionId = arr.questionId;
                var content = arr.content;
                var patient = arr.patient;
                var createdAt = arr.createdAt;
                $('#question-'+questionId).append(`
                <div class="user-answer blog-content row">
                  <div class="avatar-user col-md-1"><img src="{{asset('img/patient/'.Auth::guard('patient')->user()->avatar)}}" alt=""></div>
                  <div class="col-md-11 pad-10">
                    <b>`+patient+`</b>
                    <p class="text-justify">`+content+`</p>
                  </div>
                </div>
                `);
                $('#answer-box-'+questionId).val('');
                replynum = parseInt($('#question-reply-'+questionId).text()) + 1;
                $('#question-reply-'+questionId).text(replynum);
            });
        });

      });
    </script>
  </body>

</html>