@include('admin.layouts.header')
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
    	@include('admin.layouts.menu')
    	<!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <div class="page-container">
        	@include('admin.layouts.sideBar')
        	<!-- BEGIN CONTENT -->
        		@yield('content')
            <!-- END CONTENT -->

        </div>

        @include('admin.layouts.footer')
    </div>
    @yield('script')
		
</body>
