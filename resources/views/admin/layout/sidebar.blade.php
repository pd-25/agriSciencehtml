<div id="sidebar">
    <div class="sidebar-header p-4 d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none d-flex align-items-center">
            <img src="{{ asset('frontend-asset/images/logo.png') }}" height="40" alt="Logo" class="me-2">
            <div>
                <h5 class="mb-0 fw-bold" style="color: var(--accent-color);">AGS Admin</h5>
                <span class="small text-muted">Agriscience</span>
            </div>
        </a>
    </div>

    <div class="sidebar-menu px-3">
        <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2" style="font-size: 0.7rem; letter-spacing: 1px;">Main Navigation</p>
        
        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.dashboard') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-th-large me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Dashboard</span>
                </a>
            </li>

            {{-- <li class="nav-item mt-2">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 text-muted" href="#" data-bs-toggle="collapse" data-bs-target="#academicsMenu">
                    <i class="fa fa-graduation-cap me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Members</span>
                    <i class="fa fa-chevron-right ms-auto small"></i>
                </a>
                <div class="collapse ms-4 mt-1" id="academicsMenu">
                    <ul class="nav flex-column gap-1 small">
                        <li><a href="{{ route('admin.members.index') }}" class="nav-link p-2 {{ Route::is('admin.members.*') ? 'text-primary fw-bold' : 'text-muted' }}">Members</a></li>
                        <li><a href="{{ route('admin.syllabus.index') }}" class="nav-link p-2 {{ Route::is('admin.syllabus.*') ? 'text-primary fw-bold' : 'text-muted' }}">Syllabus</a></li>
                        <!-- <li><a href="#" class="nav-link p-2 text-muted">Examination</a></li> -->
                    </ul>
                </div>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.members.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}" href="{{ route('admin.members.index') }}">
                    <i class="fa fa-chalkboard-teacher me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Members</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.partners.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}" href="{{ route('admin.partners.index') }}">
                    <i class="fa fa-chalkboard-teacher me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Partners</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.gallery.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}" href="{{ route('admin.gallery.index') }}">
                    <i class="fa fa-images me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Gallery</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.events.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}" href="{{ route('admin.events.index') }}">
                    <i class="fa fa-calendar-alt me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Events</span>
                </a>
            </li>

            <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2" style="font-size: 0.7rem; letter-spacing: 1px;">Administration</p>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.noticeboard.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}" href="{{ route('admin.noticeboard.index') }}">
                    <i class="fa fa-envelope-open-text me-3" style="width: 20px;"></i>
                    <span class="fw-medium">NoticeBoard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.latest-news.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}" href="{{ route('admin.latest-news.index') }}">
                    <i class="fa fa-newspaper me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Latest News</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.careers.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}" href="{{ route('admin.careers.index') }}">
                    <i class="fa fa-briefcase me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Careers</span>
                </a>
            </li> --}}
        </ul>
    </div>

    <div class="sidebar-footer p-4 mt-auto">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light w-100 rounded-4 d-flex align-items-center justify-content-center p-3 shadow-sm border-0">
                <i class="fa fa-sign-out-alt me-2 text-danger"></i>
                <span class="fw-bold text-dark">Logout</span>
            </button>
        </form>
    </div>
</div>

<style>
    #sidebar .nav-link:hover {
        background: rgba(67, 97, 238, 0.05);
        color: var(--accent-color) !important;
    }
    #sidebar .nav-link.active i {
        color: var(--accent-color);
    }
    #sidebar .nav-link[data-bs-toggle="collapse"][aria-expanded="true"] i.ms-auto {
        transform: rotate(90deg);
    }
</style>
