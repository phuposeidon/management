@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3 col-md-6 banner-info-1">
            <div class="banner-text text-center">
                <form action="{{asset('post-appointment')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <h1 class="white">Chọn khung giờ khám </h1>

                    <p>Ngày khám: {{$appointmentDate}} </p>

                    <ul class="hours-board">
                        @foreach($allHours as $hour)
                        <li class="hours-box">
                            <p>{{substr($hour->hour, 0 , 5)}}</p>
                            <span class="seat">
                                <?php 
                                    $i = "Còn chỗ";
                                    foreach($selectedDates as $appointment)
                                    {
                                        if($appointment['hour'] != $hour->hour )
                                            $i = "Còn chỗ"; 
                                        else
                                        {
                                            $i = "Hết chỗ";
                                            break;
                                        }
                                    }
                                    echo $i;
                                ?>
                            </span>
                            <input type="hidden" name="selected-hour" value="{{$hour->hour}}"> 
                        </li>
                        @endforeach
                        <!-- <li class="hours-box">
                            <p>8:00</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box hours-noslot">
                            <p>8:30</p>
                            <span>Hết chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>9:00</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>9:30</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>10:00</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>10:30</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>11:00</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>13:00</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>13:30</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>14:00</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>14:30</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>15:00</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>15:30</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>16:00</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li>
                        <li class="hours-box">
                            <p>16:30</p>
                            <span>Còn chỗ</span>
                            <input type="hidden" name="" value="">
                        </li> -->
                    </ul>

                    <button id="selectBtn" type="button" class="btn btn-appoint">Chọn giờ</button>
                    <!-- data-toggle="modal" data-target="#modal-success" -->
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>

    
    <!-- Modal -->
    <div id="modal-success" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông báo</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn đã đặt lịch khám thành công.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{asset('index')}}" class="btn btn-success">Đồng ý</a>
                </div>
            </div>
        </div>
    </div>  
    <!-- End Modal -->

  </section>
    @include('client.layouts.footer')

  <script>
    $(document).ready(function() {

        //active menu bar
      $('#myNavbar ul .indexBtn').removeClass('active');
      $('#myNavbar ul .bookingBtn').addClass('active');

      $(".seat:contains('Hết chỗ')").parent('li.hours-box').addClass('hours-noslot');
    
      $val = 0;
      $('.hours-box').click(function(){
        
        $('.hours-board li').removeClass('hours-selected');
        $(this).addClass('hours-selected');
        if($(this).hasClass('hours-noslot')) {
          $(this).removeClass('hours-selected');
        }
        //get selected hour 
        $val = $(".hours-selected input[type=hidden][name=selected-hour]").val();
      });

      //show modal booking success
      $('#selectBtn').click(function() {
        if($('.hours-board li').hasClass('hours-selected')) {
          $('#modal-success').modal();
        }
      });

      
    });
  </script>
</body>

</html>