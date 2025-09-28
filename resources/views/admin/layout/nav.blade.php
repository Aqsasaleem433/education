 <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <div class="d-flex align-items-center">
                        <div class="dropdown me-4">
                            <button class="btn btn-light dropdown-toggle" type="button" id="notificationDropdown" data-bs-toggle="dropdown">
                                <i class="fas fa-bell"></i>
                                <span class="badge bg-danger">3</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">New user registered</a></li>
                                <li><a class="dropdown-item" href="#">Order completed</a></li>
                                <li><a class="dropdown-item" href="#">Server alert</a></li>
                            </ul>
                        </div>
                        
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown">
                             
                                <span>Aksa</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="fas fa-sign-out-alt"></i>   Logout </a></li>
                                      
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                         </form>
                           </ul>
                        </div>
                    </div>
                </div>
            </nav>