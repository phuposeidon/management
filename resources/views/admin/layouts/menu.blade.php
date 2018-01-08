<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
                {{--<img src="layouts/layout/img/logo.png" alt="logo" class="logo-default" />--}} </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a id="notification" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default"> 7 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 pending</span> notifications</h3>
                                        <a href="page_user_profile_1.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">just now</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">3 mins</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Server #12 overloaded. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">10 mins</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Server #2 not responding. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">14 hrs</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> Application error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">2 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Database overloaded 68%. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">3 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> A user IP blocked. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">4 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Storage Server #4 not responding dfdfdfd. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">5 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> System Error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">9 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Storage server failed. </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-default" id="count_msg"> {{count(App\Question::where('active','=',0)->get())}} </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>Bạn có
                                            <span class="bold" id="count_view">{{count(App\Question::where('active','=',0)->get())}}</span> câu hỏi mới </h3>
                                        <a href="app_inbox.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" id="toast" style="height: 275px;" data-handle-color="#637283">
                                            <?php
                                                 $questions = App\Question::orderBy('createdAt', 'desc')->limit(5)->get();                          
                                            ?>
                                            @foreach($questions as $question)
                                            <li>
                                                <a href="{{route('questionId',['id'=>$question->id])}}">
                                                    <span class="photo">
                                                    <?php $questionImgs = App\Patient::where('id', $question->patientId)->get();?> @foreach($questionImgs as $img)
                                                        <img src="{{asset('img/patient/'.$img->avatar)}}"> </span>@endforeach
                                                    <span class="subject">
                                                        <span class="from"> @if($question->anonymous == 1) Thành viên giấu tên @else {{$question->Patient->fullname}} @endif </span>
                                                        <span class="time">@if(Carbon\Carbon::today()->format('Y-m-d') == Carbon\Carbon::Parse($question->createdAt)->format('Y-m-d')) Hôm nay, {{Carbon\Carbon::Parse($question->createdAt)->format('H:i')}}
                      @elseif(Carbon\Carbon::yesterday()->format('Y-m-d') == Carbon\Carbon::Parse($question->createdAt)->format('Y-m-d'))
                      Hôm qua, {{Carbon\Carbon::Parse($question->createdAt)->format('H:i')}} @else {{Carbon\Carbon::Parse($question->createdAt)->format('d-m-Y
                      H:i')}} @endif</span>
                                                    </span>
                                                    <span class="message">{!!$question->content!!} </span>
                                                </a>
                                            </li>
                                            @endforeach
                                            {{--  <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">16 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Bob Nilson </span>
                                                        <span class="time">2 hrs </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">40 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">46 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>  --}}
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{asset('img/user/'.Auth::user()->avatar)}}" width="29px"/>
                        <span class="username username-hide-on-mobile"> Xin chào, {{Auth::user()->fullname}} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{asset('user/'.Auth::user()->id)}}">
                                <i class="icon-user"></i> Thông tin cá nhân </a>
                        </li>
                        
                        <li class="divider"> </li>
                        <!-- <li>
                            <a href="page_user_lock_1.html">
                                <i class="icon-lock"></i> Lock Screen </a>
                        </li> -->
                        <li>
                            <a href="{{asset('user-logout')}}">
                                <i class="icon-key"></i> Đăng xuất </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>

{{--  <script type="text/javascript">
    $(document).ready(function() {
        alert('sad');    
    });
</script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="js/jquery.toast.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="pages/scripts/ui-toastr.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">
    $(document).ready(function() {
        
         var socket = io(':3001');
         socket.on('notifi_success',function(msg){
            console.log(msg);
            $.toast({
                heading: 'Thông báo mới',
                text: msg.patient + ' vừa đặt câu hỏi cho bạn. Vui lòng kiểm tra và trả lời sớm nhất ',
                icon: 'info',
                position: 'bottom-right',
                loader: true,        // Change it to false to disable loader
                bgColor:"#32c5d2",
                textColor:"white"  // To change the background
            })
            var count = parseInt($('#count_msg').text())+1;
            $('#count_view').text(count);
            $('#count_msg').text(count);
            $('#toast').prepend(`
                <li>
                    <a href="#">
                        <span class="photo">
                            <img src="`+msg.avatar+`"> </span>
                        <span class="subject">
                            <span class="from">`+msg.patient+` </span>
                            <span class="time"> Hôm nay, `+msg.date+` </span>
                        </span>
                        <span class="message"> `+msg.content+`</span>
                    </a>
                </li>
            `);
         });
    });
</script>
