<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- <li class="menu-title">Main</li> --}}
                <li class="active">
                    <a href="{{url('/doctorHome')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ url('/completed_app') }}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                </li>
                <li>

                    <a href="{{ url('/doctor_profile') }}"><i class="fa fa-info"></i> <span>Your Profile</span></a>
                </li>
                <li>
                    <a href="{{ url('/edit_profile') }}"><i class="fa fa-info-circle"></i> <span>Update Profile</span></a>
                </li>
                <li>
                    <a href="{{ url('/slot_update') }}"><i class="fa fa-calendar-check-o"></i> <span>Schedule Change</span></a>
                </li>
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
