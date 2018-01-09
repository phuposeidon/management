@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3 col-md-6 banner-info-1">
            <div class="banner-text text-center">
                <!-- <form action="{{asset('post-appointment')}}" method="POST" id="postAppointment"> -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="patientId" value="{{$getPatientId}}">
                    <input type="hidden" name="doctorId" value="{{$doctorId}}">
                    <input type="hidden" name="appointmentDate">

                    <h1 class="white">Chọn khung giờ khám </h1>
                    
                    <div class="row">
                        <label class="col-md-offset-1 col-md-3 text-right" style="margin-top: 10px;">Bác sĩ:</label> 
                        <div class="col-md-6"> 
                            <input type="text" class="form-control br-radius-zero text-center" value="{{App\User::find($doctorId)->fullname}}" readonly=""/></p>
                        </div>
                    <!-- $appointmentDate  -->
                    </div>

                    <div class="row">
                        <label for="appointment-date" class="col-md-offset-1 col-md-3 text-right" style="margin-top: 10px;">Ngày khám:</label> 
                        <div class="col-md-6"> 
                            <input type="text" class="form-control br-radius-zero datepicker text-center" id="selectedDate" name="appointment-date" value="{{Carbon\Carbon::today()->format('d-m-Y')}}" readonly=""/></p>
                        </div>
                    <!-- $appointmentDate  -->
                    </div>
                    

                    <ul class="hours-board">
                        
                        
                    </ul>

                    <button id="selectBtn" type="button" class="btn btn-appoint">Chọn giờ</button>
                    <!-- data-toggle="modal" data-target="#modal-success" -->
                <!-- </form> -->
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

      //Select booking date (the next day at default)
      $('#selectedDate').datepicker('option', 'beforeShowDay', function(date) {
                var day = date.getDay();
                return [(day != 0 && day != 6), ''];
            }
        );
        $('#selectedDate').datepicker("option", "minDate", 1);

        $('#selectedDate').change(function() {
            $('.hours-box').remove();
            _token = $('input[name="_token"]').val();
            doctorId = $('input[name="doctorId"]').val();
            appointmentDate = $('#selectedDate').val();
            var posting = $.post({
                url: 'ajax/get-hours',
                type: "POST",
                data: {_token:_token, appointmentDate: appointmentDate,doctorId:doctorId}
            });
            posting.done(function(data){
                hours = jQuery.parseJSON( data );
                array = '';
                console.log(appointmentDate);
                for(i = 0; i < hours.length;i++) {
                    date = appointmentDate + " " + hours[i].hour + ":00";
                    array += `
                    <li class="hours-box">
                        <p>`+ hours[i].hour+`</p>
                        <span class="seat">`+hours[i].seat+`</span>
                        <input type="hidden" name="selected-hour" value="`+date+`"> 
                    </li>
                    `;
                }
                $('.hours-board').append(array);
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
                    $('input[name="appointmentDate"]').val($val);
                });
            });
        });
        
        $('#selectBtn').click(function(){
            value = $('input[name="appointmentDate"]').val();
            if(jQuery.isEmptyObject(value)) {
                alert("Vui lòng chọn giờ khám.");
            }
            else {
                //$('#postAppointment').submit();
                

                _token = $('input[name="_token"]').val();
                doctorId = $('input[name="doctorId"]').val();
                patientId = $('input[name="patientId"]').val();
                appointmentDate = $('input[name="appointmentDate"]').val();
                var posting = $.post({
                    url: 'ajax/post-appointment',
                    type: "POST",
                    data: {_token:_token, appointmentDate: appointmentDate,doctorId:doctorId,patientId:patientId}
                });
                posting.done(function(data){
                    $('.hours-box').remove();
                    hours = jQuery.parseJSON( data );
                    array = '';
                    console.log(appointmentDate);
                    for(i = 0; i < hours.length;i++) {
                        date = appointmentDate + " " + hours[i].hour + ":00";
                        array += `
                        <li class="hours-box">
                            <p>`+ hours[i].hour+`</p>
                            <span class="seat">`+hours[i].seat+`</span>
                            <input type="hidden" name="selected-hour" value="`+date+`"> 
                        </li>
                        `;
                    }
                    $('.hours-board').append(array);
                    $(".seat:contains('Hết chỗ')").parent('li.hours-box').addClass('hours-noslot');

                    alert("Chúc mừng bạn đã đặt lịch thành công!");

                    setTimeout(function () {
                        location.href = "index";
                    }, 5000);
                });

            }
        });

      
    });
  </script>
</body>

</html>