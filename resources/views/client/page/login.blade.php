<!-- FORM ĐĂNG KÝ, ĐĂNG NHẬP -->

<div class="modal fade" id="sign-in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{asset('plogin')}}" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="modal-dialog" role="document">

        <div class="modal-content"  id="home">
            
                <div class="modal-body" style="height: auto">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-bottom: 0.5em">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>

                    <h3 style="text-align: center; margin-top: 1.3em; padding-bottom: 0.5em"><b>ĐĂNG NHẬP</b></h3>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Username</label>

                        <div class="col-md-6">
                            <input class="form-control" name="username" value="{{ old('username') }}" required oninvalid="this.setCustomValidity('Vui lòng điền username')"
    oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" required oninvalid="this.setCustomValidity('Vui lòng điền mật khẩu')"
    oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                </div>
        </div>
    
    </div><!-- tab-content -->
    </form>
</div>

 <!-- MODAL THÔNG BÁO-->
 @if(session('thongbao'))       
<div class="bd-example">        
    <div class="modal fade" id="login-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Thông báo</h4>
                </div>
                <div class="modal-body">
                    <p>{{session('thongbao')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
