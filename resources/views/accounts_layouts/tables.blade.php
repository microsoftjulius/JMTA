<link href="{{ asset('adminNew/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of all Trainees</h6>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Options</th>
                    <th>Names</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Date Of Birth</th>
                    <th>Nationality</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>City</th>
                    <th>Phone Number</th>
                    <th>Marital Status</th>
                    <th>Denomination</th>
                    <th>Ministry</th>
                    <th>Local Church</th>
                    <th>Profession</th>
                    <th>Occupation</th>
                    <th>Payment Method</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Options</th>
                        <th>Names</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Nationality</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>City</th>
                        <th>Phone Number</th>
                        <th>Marital Status</th>
                        <th>Denomination</th>
                        <th>Ministry</th>
                        <th>Local Church</th>
                        <th>Profession</th>
                        <th>Occupation</th>
                        <th>Payment Method</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($trainees as $trainee)
                        <tr>
                            @if($trainee->status == 'paid')
                            <th><button class="btn btn-sm btn-warning">Suspend</button></th>
                            @else
                            <th><button class="btn btn-sm btn-success">Approve</button></th>
                            @endif
                            <th>{{ $trainee->first_name }} {{ $trainee->last_name }}</th>
                            <th>{{ $trainee->gender }}</th>
                            <th>{{ $trainee->email_address }}</th>
                            <th>{{ $trainee->date_of_birth }}</th>
                            <th>{{ $trainee->nationality }}</th>
                            <th>{{ $trainee->country }}</th>
                            <th>{{ $trainee->status }}</th>
                            <th>{{ $trainee->city }}</th>
                            <th>{{ $trainee->phone_number }}</th>
                            <th>{{ $trainee->marital_status }}</th>
                            <th>{{ $trainee->denomination }}</th>
                            <th>{{ $trainee->ministry }}</th>
                            <th>{{ $trainee->local_church }}</th>
                            <th>{{ $trainee->profession }}</th>
                            <th>{{ $trainee->occupation }}</th>
                            <th>{{ $trainee->payment_method }}</th>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
