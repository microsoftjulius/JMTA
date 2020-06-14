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
                <div class="card-header">User</div>
                        <table class="table table-responsive table-hover">
                            <tbody>
                            @foreach($display_user as $user)
                                <tr>
                                <td>{{$user->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                     </div>
                     </div>
                     <div class="col-lg-8">
                     <div class="card">
                     <div class="card-header">Roles </div>
                     <form class="form-horizontal mt-3" action="/assign-roles/{{request()->route()->id}}" method="get">
                                @csrf
                                <div class="card-body table-responsive no-padding">
                                <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div class="form-group row">
                                        <ul class="list-unstyled col-lg-12 col-md-12 col-xs-12 col-sm-12" id="myDiv">
                                            @if ($get_selected_role->currentPage() > 1)
                                            @php($i =  1 + (($get_selected_role->currentPage() - 1) * $get_selected_role->perPage()))
                                            @else
                                            @php($i = 1)
                                            @endif
                                            @foreach($get_selected_role as $picking_from_database)
                                            <div class="checkbox">
                                                <label>
                                                <input type="radio" class="checkbox checkbox-primary" name="user_role" value="{{$picking_from_database->id}}" @if($picking_from_database->role == $get_my_role ) checked @endif/> {{ $picking_from_database->role }}
                                                </label>
                                            </div>
                                            @endforeach
                                            @if(isset($search_query))
                                        {{ $get_selected_role->appends(['name' => $search_query])->links() }}
                                        @else
                                        {{ $get_selected_role->links() }}
                                        @endif
                                        </ul>
                                    </div>
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-warning mr-1"><a href="/settings" style="color:white;">Back</a></button>
                                        
                                        <button type="submit" class="btn btn-primary ">Save</button>
                                    </div>
                                </div>
                                </div>
                        </form>
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
        @include('admin_pages.logoutmodal');
        @include('accounts_layouts.footer')
    </body>
</html>