    <!DOCTYPE html>
    <html lang="en">
        @include('accounts_layouts.header')
        <body id="page-top">
            <!-- Page Wrapper -->
            <div id="wrapper">
            @include('accounts_layouts.sidebar')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('accounts_layouts.topbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ request()->route()->getName() }}</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        @foreach($all_courses as $courses)
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;height:240px">
                                <img src="http://jmtrumpetacademy.com/course_banners/KINGDOM-DYNAMICS-AD.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                <p class="card-text">Course Name: <a href="/enrollment-form/{{ $courses->id }}">{{ $courses->course_name }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Course</button>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
                <!-- End of Content Wrapper -->
            </div>
            <!-- End of Page Wrapper -->
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            @include('accounts_layouts.footer')
        </body>
    </html>