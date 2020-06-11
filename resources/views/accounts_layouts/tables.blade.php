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
                        <td><a href="/suspend-trainee/{{ $trainee->id }}"><button class="btn btn-sm btn-warning">Suspend</button></a></td>
                        @elseif($trainee->status == 'suspended')
                        <td><a href="/approve-trainee/{{ $trainee->id }}"><button class="btn btn-sm btn-success">Activate</button></a></td>
                        @else
                        <td><a href="/approve-trainee/{{ $trainee->id }}"><button class="btn btn-sm btn-info">Approve</button></a></td>
                        @endif
                        <td>{{ $trainee->first_name }} {{ $trainee->last_name }}</td>
                        <td>{{ $trainee->gender }}</td>
                        <td>{{ $trainee->email_address }}</td>
                        <td>{{ $trainee->date_of_birth }}</td>
                        <td>{{ $trainee->nationality }}</td>
                        <td>{{ $trainee->country }}</td>
                        <td>{{ $trainee->status }}</td>
                        <td>{{ $trainee->city }}</td>
                        <td>{{ $trainee->phone_number }}</td>
                        <td>{{ $trainee->marital_status }}</td>
                        <td>{{ $trainee->denomination }}</td>
                        <td>{{ $trainee->ministry }}</td>
                        <td>{{ $trainee->local_church }}</td>
                        <td>{{ $trainee->profession }}</td>
                        <td>{{ $trainee->occupation }}</td>
                        <td>{{ $trainee->payment_method }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
