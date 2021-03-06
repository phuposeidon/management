<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Đăng nhập</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../public/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../public/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../public/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../public/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../public/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <h2 class="white">ĐĂNG NHẬP</h2>
        </div>
        <!-- END LOGO -->
        @if(session('thongbao1'))
            <div class="alert alert-danger displayAlert col-md-offset-4 col-md-4">
                <button class="close" data-close="alert"></button>
                    <span>{{session('thongbao1')}}</span>
            </div>
        @endif
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{asset('user-login')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <h3 class="form-title">Bạn vui lòng đăng nhập</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>  Mời nhập username và password. </span>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-danger displayAlert">
                        <button class="close" data-close="alert"></button>
                            <span>{{session('thongbao')}}</span>
                    </div>
                @endif
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Tài khoản" name="username" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật khẩu" name="password" /> </div>
                </div>
                <div class="form-actions">
                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> Remember me
                        <span></span>
                    </label>
                    <button type="submit" class="btn green pull-right"> Đăng nhập </button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            
        </div>
        <!-- END LOGIN -->
        
        <!--[if lt IE 9]>
<script src="../public/global/plugins/respond.min.js"></script>
<script src="../public/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../public/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../public/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../public/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../public/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../public/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../public/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../public/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../public/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../public/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../public/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../public/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../public/pages/scripts/login-4.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function(){
                setTimeout(function()
                {
                    $('.displayAlert').fadeOut();
                },4000)
            });
        </script>
    </body>

</html>