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
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header">Select Permissions</div>
                            <form class="form-horizontal mt-3" action="/assign-permissions/{{request()->route()->role_name}}" method="get">
                                @csrf
                                <div class="card-body table-responsive no-padding">
                                <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div class="form-group row">
                                        <ul class="list-unstyled col-lg-12 col-md-12 col-xs-12 col-sm-12" id="myDiv">
                                            <li><input type="checkbox" id="select_all"/> All Permissions</li>
                                            @if ($display_all_permissions->currentPage() > 1)
                                            @php($i =  1 + (($display_all_permissions->currentPage() - 1) * $display_all_permissions->perPage()))
                                            @else
                                            @php($i = 1)
                                            @endif
                                            @foreach($display_all_permissions as $picking_from_database)
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="checkbox checkbox-primary" name="user_permisions[]" value="{{$picking_from_database->id}}" /> {{ $picking_from_database->permission }}
                                                </label>
                                            </div>
                                            @endforeach
                                            @if(isset($search_query))
                                        {{ $display_all_permissions->appends(['name' => $search_query])->links() }}
                                        @else
                                        {{ $display_all_permissions->links() }}
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