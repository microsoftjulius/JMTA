<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        
        <div class="sidebar-brand-text mx-3">[JMTA]</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    @if(in_array('Can view dashboard', auth()->user()->getUserPermisions()))
    <li @if(request()->route()->getName() == "Dashboard") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">
    @if(in_array('Can view enrollment form', auth()->user()->getUserPermisions()))
    {{-- <li @if(request()->route()->getName() == "Enrollment") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/enrollment-form">
        <i class="fa fa-file"></i>
        <span>Enrollment Form</span></a>
    </li> --}}
    @endif
    @if(in_array('Can view course', auth()->user()->getUserPermisions()))
    <li @if(request()->route()->getName() == "Courses") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/courses">
        <i class="fa fa-graduation-cap"></i>
        <span>Courses</span></a>
    </li>
    @endif
    @if(in_array('Can view course content', auth()->user()->getUserPermisions()))
    <li @if(request()->route()->getName() == "Course Content") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/course-contents/1">
        <i class="fa fa-folder"></i>
        <span>Course Contents</span></a>
    </li>
    @endif
    @if(in_array('Can view setting', auth()->user()->getUserPermisions()))
    <li @if(request()->route()->getName() == "Settings") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/settings">
        <i class="fa fa-cogs"></i>
        <span>Settings</span></a>
    </li>
    @endif
</ul>