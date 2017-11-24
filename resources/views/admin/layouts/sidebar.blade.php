<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <!-- <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm Sản Phẩm...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div> -->
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>

            <li class="nav-item start
            {{ (Request::is('user/*') || Request::is('user') || Request::is('user/*') ? 'active' : '') }}
            ">
                <a href="{{asset('user')}}" class="nav-link nav-toggle">
                    <i class="fa fa-user-md"></i>
                    <span class="title">Người Dùng</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>
            <li class="nav-item 
            {{ (Request::is('patient/*') || Request::is('patient') || Request::is('patient/*') ? 'active' : '') }}
            ">
                <a href="{{asset('patient')}}" class="nav-link nav-toggle">
                    <i class="fa fa-male"></i>
                    <span class="title">Bệnh Nhân</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>
                
            <!-- <li class="nav-item start">
                <a href="{{asset('province')}}" class="nav-link nav-toggle">
                    <i class="fa fa-globe"></i>
                    <span class="title">Tỉnh / Thành Phố</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start">
                <a href="{{asset('district')}}" class="nav-link nav-toggle">
                    <i class="fa fa-map-signs"></i>
                    <span class="title">Quận / Huyện</span>
                    <span class="selected"></span>
                </a>
            </li> -->

            <li class="nav-item 
            {{ (Request::is('clinic/*') || Request::is('clinic') || Request::is('clinic/*') ? 'active' : '') }}
            ">
                <a href="{{asset('clinic')}}" class="nav-link nav-toggle">
                    <i class="fa fa-hospital-o"></i>
                    <span class="title">Phòng Khám</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>

            <li class="nav-item 
            {{ (Request::is('specialization/*') || Request::is('specialization') || Request::is('specialization/*') ? 'active' : '') }}
            ">
                <a href="{{asset('specialization')}}" class="nav-link nav-toggle">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">Chuyên Khoa</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>
            <!-- <li class="nav-item start">
                <a href="{{asset('insurrance')}}" class="nav-link nav-toggle">
                    <i class="fa fa-credit-card"></i>
                    <span class="title">Thẻ Bảo Hiểm</span>
                    <span class="selected"></span>
                </a>
            </li> -->
            <li class="nav-item 
            {{ (Request::is('medicine/*') || Request::is('medicine') || Request::is('medicine/*') ? 'active' : '') }}
            ">
                <a href="{{asset('medicine')}}" class="nav-link nav-toggle">
                    <i class="fa fa-medkit"></i>
                    <span class="title">Thuốc</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>
            <li class="nav-item 
            {{ (Request::is('order/*') || Request::is('order') || Request::is('order/*') ? 'active' : '') }}
            ">
                <a href="{{asset('order')}}" class="nav-link nav-toggle">
                    <i class="fa fa-check"></i>
                    <span class="title">Hóa Đơn</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>
            <!-- <li class="nav-item start">
                <a href="{{asset('orderitem')}}" class="nav-link nav-toggle">
                    <i class="fa fa-info"></i>
                    <span class="title">Chi Tiết Hóa Đơn</span>
                    <span class="selected"></span>
                </a>
            </li> -->
             <li class="nav-item
             {{ (Request::is('service/*') || Request::is('service') || Request::is('service/*') ? 'active' : '') }}
             ">
                <a href="{{asset('service')}}" class="nav-link nav-toggle">
                    <i class="fa fa-stethoscope"></i>
                    <span class="title">Dịch Vụ</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>
            <li class="nav-item 
            {{ (Request::is('appointment/*') || Request::is('appointment') || Request::is('appointment/*') ? 'active' : '') }}
            ">
                <a href="{{asset('appointment')}}" class="nav-link nav-toggle">
                    <i class="fa fa-clock-o"></i>
                    <span class="title">Lịch Hẹn</span>
                    <span class="selected"></span>
                </a>
            </li>
            <!-- <li class="nav-item start">
                <a href="{{asset('medicalrecord')}}" class="nav-link nav-toggle">
                    <i class="fa fa-heart"></i>
                    <span class="title">Bệnh Án</span>
                    <span class="selected"></span>
                </a>
            </li> -->
            
            <li class="nav-item  
            {{ (Request::is('transaction/*') || Request::is('transaction') || Request::is('transaction/*') ? 'active' : '') }}
            ">
                <a href="{{asset('transaction')}}" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Giao Dịch</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>
            
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->