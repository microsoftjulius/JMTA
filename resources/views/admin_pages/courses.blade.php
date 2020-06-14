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
                                <a href="/enrollment-form/{{ $courses->id }}"><img src="http://jmtrumpetacademy.com/course_banners/KINGDOM-DYNAMICS-AD.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                <p class="card-text">Course Name: {{ $courses->course_name }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="/add-new-course"><button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Course</button></a>
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
            @include('admin_pages.logoutmodal');
            @include('accounts_layouts.footer')
        </body>
    </html>