<nav class="navbar navbar-expand px-4 py-0" style="height: var(--top-nav-height); position: fixed; top: 0; right: 0; left: var(--sidebar-width); background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); z-index: 999;">
    <div class="container-fluid px-0 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <!-- <button class="btn btn-light rounded-circle me-3 d-lg-none toggle-sidebar" style="width: 45px; height: 45px;">
                <i class="fa fa-bars"></i>
            </button>
            <div class="search-box d-none d-md-flex">
                <div class="input-group p-1 bg-light rounded-pill px-3" style="width: 300px;">
                    <span class="input-group-text bg-transparent border-0 text-muted"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control bg-transparent border-0 small" placeholder="Search anything...">
                </div>
            </div> -->
        </div>

        <div class="d-flex align-items-center gap-2">
            <!-- Notifications -->
            <!-- <div class="dropdown">
                <button class="btn btn-light rounded-circle position-relative" style="width: 45px; height: 45px;" data-bs-toggle="dropdown">
                    <i class="fa fa-bell text-muted"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="padding: 3px 6px; font-size: 10px; border: 2px solid #fff;">
                        3
                        <span class="visually-hidden">unread notifications</span>
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-2 border-0 shadow-lg rounded-4 mt-3" style="width: 300px;">
                    <li class="p-3 border-bottom d-flex align-items-center justify-content-between">
                        <h6 class="mb-0 fw-bold">Notifications</h6>
                        <a href="#" class="small text-decoration-none">Mark all as read</a>
                    </li>
                    <li class="p-2"><a class="dropdown-item p-3 rounded-3" href="#">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3"><i class="fa fa-user-plus text-primary"></i></div>
                            <div>
                                <p class="mb-0 small fw-bold">New Teacher registration</p>
                                <span class="text-muted" style="font-size: 11px;">2 minutes ago</span>
                            </div>
                        </div>
                    </a></li>
                    <li class="p-3 text-center"><a href="#" class="small text-decoration-none fw-bold">View All Notifications</a></li>
                </ul>
            </div> -->

            <!-- Profile Dropdown -->
            <div class="dropdown ms-2">
                <button class="btn btn-light d-flex align-items-center gap-3 p-1 rounded-pill pe-3 border-0" data-bs-toggle="dropdown" style="transition: var(--transition);">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=4361ee&color=fff" class="rounded-circle" width="38" height="38">
                    <div class="d-none d-md-block text-start">
                        <p class="mb-0 fw-bold small text-dark">Admin User</p>
                        <p class="mb-0 text-muted" style="font-size: 11px;">Super Admin</p>
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-2 border-0 shadow-lg rounded-4 mt-3" style="width: 220px;">
                    <!-- <li><a class="dropdown-item d-flex align-items-center p-3 rounded-3" href="#"><i class="fa fa-user-circle me-3 opacity-50"></i> View Profile</a></li>
                    <li><a class="dropdown-item d-flex align-items-center p-3 rounded-3" href="#"><i class="fa fa-cog me-3 opacity-50"></i> Account Settings</a></li> -->
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center p-3 rounded-3 text-danger border-0 bg-transparent w-100"><i class="fa fa-sign-out-alt me-3 opacity-50"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
    @media (max-width: 992px) {
        nav.navbar { left: 0 !important; }
    }
</style>
