
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Paid Trainees</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $paid_employees }}</div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-check fa-2x text-success"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending Trainees</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pending_employees }}</div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-spinner fa-2x text-primary"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Suspended Trainees</div>
                    <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $suspended_employees }}</div>
                    </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-pause fa-2x text-danger"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Number</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $trainees_count }}</div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-calculator fa-2x text-warning"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Content Row -->
