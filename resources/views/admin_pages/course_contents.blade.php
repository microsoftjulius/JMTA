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
                <div class="row">
                    <div class="col-lg-8">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="padding-left:20px"><strong>{{ request()->route()->getName() }}</strong></h1>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <select name="" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($course_contents as $lesson)
                                <option value="{{ $lesson->id }}">{{ $lesson->content }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="container">
                    <div class="row">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th colspan="2">Playing Video Course name</th>
                                <th scope="col">Other Videos</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="card" style="width: 700px; height:340px">
                                        <iframe width="100%" height="340px"
                                        src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                    </div>
                                    <h3>Course Name:</h3> This is the Course name
                                    <h3>Description:</h3>This is the course description
                                </td>
                                <td><div class="card" style="width: 18rem; height:340px">
                                    <iframe width="100%" height="340px"
                                        src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                </div></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td><div class="card" style="width: 18rem; height:240px">
                                    <iframe width="100%" height="340px"
                                    src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                    </iframe>
                                </div>
                                </td>
                                
                            </tr>

                            <tr>
                                <td colspan="2"></td>
                                <td><div class="card" style="width: 18rem; height:240px">
                                    <iframe width="100%" height="340px"
                                        src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                </div>
                                </td>
                                
                            </tr>
                            </tbody>
                        </table>
                    </div>
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