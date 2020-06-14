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
                        {{-- <select name="" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($course_contents as $lesson)
                                <option value="{{ $lesson->id }}">{{ $lesson->content }}</option>
                            @endforeach
                        </select> --}}
                        <a href="/course-contents/1">Show all videos</a>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="container">
                    <div class="row">
                        <table class="table table-borderless table-responsive">
                            <thead>
                            <tr>
                                <th colspan="2">Playing Video Course name</th>
                                <th scope="col">Other Videos</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach ($get_first_video as $item)
                                <td colspan="2">
                                    <div class="card" style="width: 700px; height:440px">
                                    <video width="100%" height="100%" controls>
                                        <source src="{{URL::asset("/videos/$item->content")}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <h5>Course Name: {{ $item->course_name }}</h5> 
                                    <h5>Description: {{ $item->content }}</h5>
                                    </div>
                                </td>
                                @endforeach
                                @foreach ($get_second_video as $item)
                                <td>
                                    <a href="/course-contents/{{ $item->id }}">
                                        <div class="card" style="width: 18rem; height:440px">
                                            <video width="100%" height="100%" controls>
                                                <source src="{{URL::asset("/videos/$item->content")}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </a>
                                </td>
                                @endforeach
                            </tr>
                            @foreach ($get_other_videos as $lesson)
                            <tr>
                                <td colspan="2"></td>
                                <td><div class="card" style="width: 18rem; height:240px">
                                    <a href="/course-contents/{{ $lesson->id }}">
                                        <div class="card" style="width: 18rem; height:240px">
                                            <video width="100%" height="100%" controls>
                                                <source src="{{URL::asset("/videos/$lesson->content")}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </a>
                                </div>
                                </td>
                                
                            </tr>
                            @endforeach
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
        @include('admin_pages.logoutmodal');
        @include('accounts_layouts.footer')
    </body>
</html>