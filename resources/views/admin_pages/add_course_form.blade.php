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
                    <form action="/create-new-course" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="br-pagebody">
                        <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-t-6 mg-b-10">Create a new Course</h6>
            
                        <div class="form-layout form-layout-1">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="form-control-label">Course name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ old('course_name') }}" name="course_name" placeholder="Enter course name" autocomplete="off" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-md-4 mg-t--1 mg-md-t-0">
                                <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Course Description: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ old('course_desc') }}" name="course_desc" placeholder="Enter course description" autocomplete="off" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-md-4 mg-t--1 mg-md-t-0">
                                <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Course Image: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" value="{{ old('course_image') }}" name="course_image" autocomplete="off" required>
                                </div>
                            </div><!-- col-4 -->
                            </div><!-- row -->
                            <div class="form-layout-footer">
                            <button class="btn btn-info">Submit Form</button>
                            <a href="/courses"><button type="button" class="btn btn-secondary">Back</button></a>
                            </div><!-- form-group -->
                        </div><!-- form-layout -->
                        </div><!-- br-section-wrapper -->
                    </div><!-- br-pagebody -->
                    </form>
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