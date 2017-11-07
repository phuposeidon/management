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
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm Sản Phẩm...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>

            <li class="nav-item start">
                <a href="management/public/user" class="nav-link nav-toggle">
                    <i class="fa fa-user-md"></i>
                    <span class="title">Người Dùng</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="/user" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh Sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>

                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="{{route('patient')}}" class="nav-link nav-toggle">
                    <i class="fa fa-male"></i>
                    <span class="title">Bệnh Nhân</span>
                    <span class="selected"></span>
                </a>
                <!-- end receipt  -->
            </li>
                
            <li class="nav-item start">
                <a href="admin/userrole" class="nav-link nav-toggle">
                    <i class="fa fa-globe"></i>
                    <span class="title">Tỉnh / Thành Phố</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/userrole" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh Sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>

            <li class="nav-item start">
                <a href="admin/product" class="nav-link nav-toggle">
                    <i class="fa fa-map-signs"></i>
                    <span class="title">Quận / Huyện</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/product" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh Sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                </ul>
                <!-- end receipt  -->
            </li>

            <li class="nav-item start">
                <a href="admin/product" class="nav-link nav-toggle">
                    <i class="fa fa-hospital-o"></i>
                    <span class="title">Phòng Khám</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/ingredient-purchase" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh Sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>

            <li class="nav-item start">
                <a href="admin/customer-type" class="nav-link nav-toggle">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">Chuyên Khoa</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/customer-type" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh Sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="admin/customer" class="nav-link nav-toggle">
                    <i class="fa fa-credit-card"></i>
                    <span class="title">Thẻ Bảo Hiểm</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/customer" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh Sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="admin/product-stock" class="nav-link nav-toggle">
                    <i class="fa fa-medkit"></i>
                    <span class="title">Thuốc</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/product-stock" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh Sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                </ul>

                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="admin/product-stock" class="nav-link nav-toggle">
                    <i class="fa fa-check"></i>
                    <span class="title">Hóa Đơn</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/order" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh Sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="admin/manage_step" class="nav-link nav-toggle">
                    <i class="fa fa-info"></i>
                    <span class="title">Chi Tiết Hóa Đơn</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/manage_step" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
             <li class="nav-item start">
                <a href="admin/deliver" class="nav-link nav-toggle">
                    <i class="fa fa-stethoscope"></i>
                    <span class="title">Dịch Vụ</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/deliver" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Kế Hoạch</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="admin/manage_receipt" class="nav-link nav-toggle">
                    <i class="fa fa-clock-o"></i>
                    <span class="title">Lịch Hẹn</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/plan" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách kế hoạch</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                
                </ul>
            </li>
            <li class="nav-item start">
                <a href="admin/manage_unit" class="nav-link nav-toggle">
                    <i class="fa fa-heart"></i>
                    <span class="title">Bệnh Án</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/manage_unit" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="admin/manage_ingredient_sample" class="nav-link nav-toggle">
                    <i class="fa fa-heartbeat"></i>
                    <span class="title">Xét Nghiệm</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/manage_ingredient_sample" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="admin/list_supplier" class="nav-link nav-toggle">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Kết Quả Xét Nghiệm</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/list_supplier" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách NCC</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
            <li class="nav-item start">
                <a href="admin/manage_receipt" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Giao Dịch</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="admin/manage_receipt" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end receipt  -->
            </li>
            
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->