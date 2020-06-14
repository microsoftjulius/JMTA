<link href="{{ asset('adminNew/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
        <!-- DataTales Example -->
        @if(request()->route()->getName() == "Dashboard")
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of all Trainees</h6>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered responsive nowrap" id="dataTable" width="100%" cellspacing="0" >
                <thead class="table thead-light" style="text-transform:uppercase">
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
                <tbody>
                    @foreach ($trainees as $trainee)
                    <tr>
                        @if($trainee->status == 'paid')
                        <td><a href="/suspend-trainee/{{ $trainee->id }}"><button class="btn btn-sm btn-warning">Suspend</button></a></td>
                        @elseif($trainee->status == 'suspended')
                        <td><a href="/approve-trainee/{{ $trainee->id }}"><button class="btn btn-sm btn-success">Activate</button></a></td>
                        @else
                        <td><a href="/approve-trainee/{{ $trainee->id }}"><button class="btn btn-sm btn-primary">Approve</button></a></td>
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
                <div id="toolbar">
                    <button id="export" class="btn btn-sm btn-primary">Export</button>
                </div>
                </table>
            </div>
            </div>
        </div>
        @endif

        @if(request()->route()->getName() == "Settings")
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of all Users</h6>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered responsive nowrap" id="dataTable" width="100%" cellspacing="0" >
                <thead class="table thead-light" style="text-transform:uppercase">
                    <tr>
                        <th>Name(s)</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_users as $users)
                    <tr>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td ><a href="/display-role/{{ $users->role}}">{{ $users->role }}</a></td>
                        <td>
                         <a href="/display-user-and-roles/{{$users->id}}" button type="button" class="btn btn-sm btn-light"><i class="fa fa-key"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                <div id="toolbar">
                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create new role</button>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal -->
        <form action="/save-role" method="get">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <input type="text" name="role" id="" class="form-control" autocomplete="off">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        </form>
        <!--modal to view roles-->
        
        <!--End view roles modal-->
        @endif
