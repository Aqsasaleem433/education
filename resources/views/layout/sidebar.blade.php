 <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>EDU</h3>
            </div>
            
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-school"></i>
                        <span>Schools</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-user"></i>
                        <span>Staff</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-users"></i>
                        <span>Student</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-user"></i>
                        <span>Parents</span>
                    </a>
                </li>
    
                 @can('user-list')
                   <li class="dropdown">
                     <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-user"></i><span>Access Management</span></a>
                     <ul class="dropdown-menu">
                         <li><a class="nav-link" href="{{ route('admin.users.index') }}">User List</a></li>
                     </ul>
                      <ul class="dropdown-menu">
                         <li><a class="nav-link" href="{{ route('admin.roles.index') }}">Roles List</a></li>
                     </ul>
                    </li>
                  @endcan
              <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
            
           
        </nav>