@extends('admin.layouts.master')
@section('content')
     <!-- BEGIN CONTENT -->
     <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Trang chủ</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Câu hỏi</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Chi tiết</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> CHI TIẾT CÂU HỎI
            </h1>
            <div class="alert alert-success" id="report" style="display: none">Đã xóa trả lời thành công.</div>
	        <div class="alert alert-success" id="reportAll" style="display: none">Các trả lời được chọn đã xóa thành công.</div>
            
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
           
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    
                        <div class="portlet-body blog-page blog-content-2">
                            <div class="blog-single-content bordered blog-container">
                                <div class="blog-single-head">
                                    <div class="blog-single-head-title">
                                        <img src="{{asset('img/patient/'.$getQuestionById->Patient->avatar)}}" alt="" class="ava-user">
                                        {{$getQuestionById->Patient->fullname}}
                                    </div>
                                    <div class="blog-single-head-date">
                                        <i class="icon-calendar font-blue"></i>
                                        <a href="javascript:;">{{Carbon\Carbon::Parse($getQuestionById->createdAt)->format('d-m-Y H:i')}}</a>
                                    </div>
                                </div>
                                <!-- <div class="blog-single-img">
                                    <img src="pages/img/background/4.jpg" /> </div> -->
                                <div class="blog-single-desc">
                                    <p> {!! $getQuestionById->content !!} </p>

                                    <div class="question-pic">
                                        <ul class="list-pic">
                                        <?php $questionImgs = App\QuestionImage::where('questionId', $getQuestionById->id)->get();?>
                                        @foreach($questionImgs as $img)
                                            <li class="picture" style="height: 150px">
                                                <img src="{{asset('img/questionimage/'.$getQuestionById->id.'/'.$img->url)}}">
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>

                                    <!-- The Modal -->
                                    <div id="pic-modal" class="modal1">
                                        <span class="close1">&times;</span>
                                        <img class="modal-content1" id="img01">
                                        <div id="caption"></div>
                                    </div>


                                </div>
                                <div class="blog-single-foot">
                                    <ul class="blog-post-tags">
                                        <li class="uppercase">
                                            <a href="javascript:;">{{$getQuestionById->Specialization->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-comments">
                                    <h3 class="sbold blog-comments-title"><i class="fa fa-comments"></i> {{count($answers)}}</h3>
                                    <div class="c-comment-list">
                                        @foreach($answers as $answer)
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="" src="@if(isset($answer->Patient->fullname)) {{asset('img/patient/'.$answer->Patient->avatar)}} @else {{asset('img/user/'.$answer->User->avatar)}} @endif"> </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    @if(isset($answer->Patient->fullname))
                                                        <a href="#">{{$answer->Patient->fullname}}</a>
                                                    @else
                                                        <a href="#"><i class="fa fa-user-md"></i> Bác sĩ {{$answer->User->fullname}}</a>
                                                    @endif
                                                    <span class="c-date">{{Carbon\Carbon::Parse($answer->createdAt)->format('d-m-Y H:i')}}</span>
                                                </h4> {!!$answer->content!!} </div>
                                        </div>
                                        @endforeach
                                        <!-- <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="" src="pages/img/avatars/team3.jpg"> </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#">Strong Strong</a> on
                                                    <span class="c-date">21 May 2015, 11:40AM</span>
                                                </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                                
                                            </div>
                                        </div> -->
                                    </div>
                                    <h3 class="sbold blog-comments-title">Trả Lời</h3>
                                    <!-- <form action="ajax/question/post" method="post" id="answerForm"> -->
                                    <div id="answerForm">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="doctorId" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="questionId" value="{{$getQuestionById->id}}">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img src="{{asset('img/user/'.Auth::user()->avatar)}}" alt="" class="ava-user">
                                            </div>
                                            <div class="form-group col-md-10">
                                                <textarea rows="2" name="content" placeholder="Trả lời tại đây ..." class="form-control c-square"></textarea>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <button id="sendAnswer" type="submit" class="btn blue uppercase btn-md sbold btn-block">Gửi</button>
                                            </div>
                                        </div>
                                    </div>    
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <script>
        $(document).ready(function() {
            $('head').append('<link rel="stylesheet" type="text/css" href="client/css/style.css">');

            //picture comment modal
            $('.picture img').click(function(){
            
                $('.navbar').hide();
                $('#pic-modal').css('display','block');
                $('#img01').attr('src', $(this).attr('src'));
            });
            // Get the <span> element that closes the modal
            $('span.close1').click(function() {
                $('#pic-modal').css('display','none');
                $('.navbar').show();
            });

            //ajax send answer
            $('#sendAnswer').click(function (){
                //url = $('#answerForm').attr('action');
                _token = $('#answerForm input[name="_token"]').val();
                doctorId = $('#answerForm input[name="doctorId"]').val();
                questionId = $('#answerForm input[name="questionId"]').val();
                text = $('#answerForm textarea[name="content"]').val();
                content = text.replace(/\n\r?/g, '<br />');
                var posting = $.post({
                    url: 'ajax/question/post',
                    type: "POST",
                    data: {_token:_token, doctorId: doctorId, questionId: questionId, content: content}//$('#sendAnswer').serialize()
                });
                posting.done(function(data){
                    var arr = jQuery.parseJSON(data);
                    var content = arr.content;
                    var doctor = arr.doctor;
                    var createdAt = arr.createdAt;
                    $('.c-comment-list').append(`
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" alt="" src="{{asset('img/user/'.Auth::user()->avatar)}}"> </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="#"><i class="fa fa-user-md"></i> Bác sĩ `+doctor+`</a>
                                    <span class="c-date">`+createdAt+`</span>
                                </h4> `+content+`
                                
                            </div>
                        </div>
                    `);
                    $('#answerForm textarea[name="content"]').val('');
                });
            });

            //Xoá 1 dòng
            $('.delete').on('click',function(e){
                e.preventDefault();
                var id = $(this).data('id');
                $('#modal-1').data('id',id).modal('show');
            });
            $("#report").hide();
            $('#yesBtn').click(function(){
                var id = $('#modal-1').data('id');
                $('#modal-1').modal('hide');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'question-delete',
                    dataType: 'text',
                    data: {id: id},
                    success:function(data){
                        $('#tr' + id).fadeOut();
                        $('#tr' + id).remove();
                        $("#report").show();
                        setTimeout(function()
                            {
                                $('#report').fadeOut();
                            },4000);
                    }
                });
            });

            //Xoá tất cả
			$('#deleteAll').on('click',function(e){
				e.preventDefault();
				$('#modal-all').modal('show');
			});
			$("#reportAll").hide();
			$('#yesBtnAll').click(function(){
				$('#modal-all').modal('hide');
				var val = [];
				$(':checkbox:checked').each(function(i){
					val[i] = $(this).val();			//get id của từng row       	
				});
				if(val[0] == 'on') {				//Nếu th đã check thì bỏ qua
					val.shift();
				}
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type: 'POST',
					url: 'question-multidelete',
					dataType: 'text',
					data: {id: val},
					success:function(data){
						for(var i = 0; i < val.length; i++) {
							$('#tr' + val[i]).fadeOut();
							$('#tr' + val[i]).remove();
							$("#reportAll").show();
							setTimeout(function()
                            {
                            	$('#reportAll').fadeOut();
                            },4000);
						}
					}
				});
			});


        })
    </script>
    
@endsection