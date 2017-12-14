@include('client.layouts.header')

<body>
  <section id="banner" class="banner">
    <div class="bg-color">
      @include('client.layouts.menu-bar1')
      <div class="container">
        <div class="row">
          <div class="col-md-offset-4 col-md-4 banner-info-1">
            <div class="banner-text text-center">
                <form action="{{asset('hours')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    @if($getNewPatientId != '')
                    <input type="hidden" name="patientId" value="{{$getNewPatientId}}">
                    @endif

                    <h1 class="white">Đặt lịch khám </h1>

                    <div class="form-group" style="margin-top: 40px;">
                        <label for="" class="label-bottom">Chọn loại bệnh: </label>
                        <select name="specializationId" class="form-control br-radius-zero" id="Spec">
                            @foreach($specializations as $specialization)
                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-bottom">Chọn bác sĩ: </label>
                        <select name="doctorId" class="form-control br-radius-zero" id="Doctor">
                            <!-- <option value="">Bác sĩ bất kỳ</option> -->
                            @foreach($doctors as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->fullname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-bottom">Chọn ngày khám: </label>
                        <input type="text" class="form-control br-radius-zero datepicker" id="selectedDate" name="appointmentDate" value="{{Carbon\Carbon::today()->format('d-m-Y')}}"/>
                        <!-- required oninvalid="this.setCustomValidity('Vui lòng chọn ngày khám')"
        oninput="setCustomValidity('')" -->
                     </div>

                    <button type="submit" class="btn btn-appoint">Chọn giờ</button>
                </form>
            </div>

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
            $('#myNavbar ul .bookingBtn').addClass('active');

            var id = $('#Spec').val();
			$.get("ajax/specialization/"+id, function(data){
					$("#Doctor").html(data);
				});
            //Load hotel
			$("#Spec").change(function(){
				var idSpecialization = $(this).val();
				$.get("ajax/specialization/"+idSpecialization, function(data){
					$("#Doctor").html(data);
				});
			});

            //Select booking date (the next day at default)
            $('#selectedDate').datepicker("option", "minDate", 1);
        });
    </script>
</body>

</html>