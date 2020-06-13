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
                        <form action="/create-new-account" method="POST">
                            @csrf
                        <div class="br-pagebody">
                        {{-- @include('layouts.messages') --}}
                            <div class="br-section-wrapper">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-t-6 mg-b-10">Enrolment form for Kingdom Dynamics</h6>
                            <p class="mg-b-30 tx-gray-600">Please fill the following form to register as a trainee.</p>
                    
                            <div class="form-layout form-layout-1">
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="form-control-label">First name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('first_name') }}" name="first_name" placeholder="Enter firstname" autocomplete="off" required>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-md-4 mg-t--1 mg-md-t-0">
                                    <div class="form-group mg-md-l--1">
                                    <label class="form-control-label">Last Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('last_name') }}" name="last_name" placeholder="Enter lastname" autocomplete="off" required>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-md-4 mg-t--1 mg-md-t-0">
                                    <div class="form-group mg-md-l--1">
                                    <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
                                    <select name="gender" id=""class="form-control">
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-md-4 mg-t--1 mg-md-t-0">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Date Of Birth: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" value="{{ old('date_of_birth') }}" name="date_of_birth" placeholder="Enter date of birth" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Nationality: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('nationality') }}" name="nationality" placeholder="Enter nationality" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('nationality') }}" name="country" placeholder="Enter Country" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('state') }}" name="state" placeholder="State" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('city') }}" name="city" placeholder="Enter the city you come from" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Phone number: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('phone_number') }}" name="phone_number" placeholder="Enter your phone number" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="email" value="" name="email_address" readonly>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Marital Status: <span class="tx-danger">*</span></label>
                                    <select value="{{ old('marital_status') }}" name="marital_status" id="" class="form-control">
                                        <option value=""></option>
                                        <option value="Single">Single</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Married"> Married</option>
                                    </select>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Denomination: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('denomination') }}" name="denomination" placeholder="Enter your denomination" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Ministry: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('ministry') }}" name="ministry" placeholder="Enter your ministry" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">local church: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('local_church') }}" name="local_church" placeholder="Enter your local church value="{{ old('input') }}" name" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Profession: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('profession') }}" name="profession" placeholder="Enter your profession" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Occupation: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ old('occupation') }}" name="occupation" placeholder="Enter your occupation" autocomplete="off" required>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Payment method: <span class="tx-danger">*</span></label>
                                    <select class="form-control" required>
                                        <option value=""></option>
                                        <option value="Cash">Cash</option>
                                        <option value="Mobile Money">Mobile Money</option>
                                        <option value="Pay pal">Pay pal</option>
                                        <option value="World Remit">World Remit</option>
                                    </select>
                                    </div>
                                </div><!-- col-8 -->
                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                    <input class="form-control" type="hidden" value="{{ request()->route()->id }}" name="course_id" required>
                                    </div>
                                </div><!-- col-8 -->
                                
                                </div><!-- row -->
                                <div class="form-layout-footer">
                                <button class="btn btn-info">Submit Form</button>
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