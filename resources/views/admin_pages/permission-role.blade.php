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
                    </div>
                </div>
                <!-- Content Row -->
            <div class="row">
                     <div class="col-lg-4">
                <div class="card">
                <div class="card-header">Role</div>
                        <table class="table table-responsive table-hover">
                            <tbody>
                            @foreach($get_selected_role as $roles)
                                <tr>
                                <td>{{$roles->role}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                     </div>
                     </div>
                     <div class="col-lg-8">
                     <div class="card">
                     <div class="card-header">Permissions</div>
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($display_permission_roles->currentPage() > 1)
                                @php($i =  1 + (($display_permission_roles->currentPage() - 1) * $display_permission_roles->perPage()))
                                @else
                                @php($i = 1)
                                @endif
                                @foreach ($display_permission_roles as $permission)
                                <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{$permission->permission}}</td>
                                <form action="/unsign-permission/{{$permission->id}}" method="POST">
                                    @csrf
                                    <td>
                                    <button class="btn btn-primary" type="submit"><span class="text-white">Remove</span></button>
                                    </td>
                                </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(isset($search_query))
                        {{ $display_permission_roles->appends(['name' => $search_query])->links() }}
                        @else
                        {{ $display_permission_roles->links() }}
                        @endif
                        <div class="">
                        <a href="/display-checkboxes/{{ request()->route()->id}}" button class="btn btn-success">Add Permission</button></a>
                        </div>
                        </div>
                     </div>
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