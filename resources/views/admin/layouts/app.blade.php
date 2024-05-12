<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Myra Studio" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

        <!-- third party css -->
        {{-- <link href="{{asset('admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" /> --}}
        
        <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

        <!-- third party css end -->

		<!-- App css -->
        <link rel="stylesheet" href="{{asset('admin/css/style.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/icons.min.css')}}">

        
        <script src="{{asset('admin/js/config.js')}}"></script>
    </head>

    <body>

        <!-- Begin page -->
        <div class="layout-wrapper">

            <!-- ========== Left Sidebar ========== -->
            @include('admin.layouts.menu')

            

            <!-- Start Page Content here -->
            <div class="page-content">

                <!-- ========== Topbar Start ========== -->
                @include('admin.layouts.header')
                <!-- ========== Topbar End ========== -->

                @yield('content')

                <!-- Footer Start -->
                @include('admin.layouts.footer')
                <!-- end Footer -->

            </div>
            <!-- End Page content -->


        </div>
        <!-- END wrapper -->
        
        <!-- App js -->
        <script src="{{asset('admin/js/vendor.min.js')}}"></script>
        <script src="{{asset('admin/js/app.js')}}"></script>

         <!-- third party js -->
         {{-- <script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
         <script src="{{asset('admin/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
         <script src="{{asset('admin/libs/pdfmake/build/pdfmake.min.js')}}"></script>
         <script src="{{asset('admin/libs/pdfmake/build/vfs_fonts.js')}}"></script> --}}
         
         {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script> --}}
         <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <!-- third party js ends -->
 
         <!-- Datatables js -->
         {{-- <script src="{{asset('admin/js/pages/datatables.js')}}"></script> --}}
        
        @yield('js')
        
    </body>
</html>