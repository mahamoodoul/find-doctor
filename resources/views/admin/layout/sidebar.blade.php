<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- <li class="menu-title">Main</li> --}}
                <li class="active">
                    <a href="{{route('doctor.Dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="{{route('admin.doctors')}}"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                </li>
                <li>
                    <a href="{{route('doctor.category')}}"><i class="fa fa-wheelchair"></i> <span>Doctor Category</span></a>
                </li>
                <li>
                    <a href="{{route('paitent.emergency')}}"><i class="fa fa-meetup"></i> <span>Emergency Contact</span></a>
                </li>
                <li>
                    <a href="schedule.html"><i class="fa fa-calendar-check-o"></i> <span>All Paitents</span></a>
                </li>
                {{-- <li>
                    <a href="departments.html"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                </li> --}}
                {{-- <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="employees.html">Employees List</a></li>
                        <li><a href="leaves.html">Leaves</a></li>
                        <li><a href="holidays.html">Holidays</a></li>
                        <li><a href="attendance.html">Attendance</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
