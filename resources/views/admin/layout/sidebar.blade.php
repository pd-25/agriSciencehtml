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

    <div class="sidebar-menu px-3" style="overflow-y: auto; flex: 1;">

        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.dashboard') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-th-large me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Dashboard</span>
                </a>
            </li>

            <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2"
                style="font-size: 0.7rem; letter-spacing: 1px;">Content</p>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.whatwedo.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.whatwedo.index') }}">
                    <i class="fa fa-briefcase me-3" style="width: 20px;"></i>
                    <span class="fw-medium">What We Do</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.impactnumbers.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.impactnumbers.index') }}">
                    <i class="fa fa-chart-line me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Our Impact</span>
                </a>
            </li>

            <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2"
                style="font-size: 0.7rem; letter-spacing: 1px;">Services</p>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.service.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.service.index') }}">
                    <i class="fa fa-cogs me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Services</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.approach.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.approach.index') }}">
                    <i class="fa fa-lightbulb me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Our Approach</span>
                </a>
            </li>

            <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2"
                style="font-size: 0.7rem; letter-spacing: 1px;">Research</p>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.research.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.research.index') }}">
                    <i class="fa fa-flask me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Our Research</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.research-numbers.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.research-numbers.index') }}">
                    <i class="fa fa-chart-bar me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Research Numbers</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.publications.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.publications.index') }}">
                    <i class="fa fa-book me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Publications</span>
                </a>
            </li>
            <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2"
                style="font-size: 0.7rem; letter-spacing: 1px;">Blogs</p>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.blogs.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.blogs.index') }}">
                    <i class="fa fa-blog me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Blogs</span>
                </a>
            </li>

            <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2"
                style="font-size: 0.7rem; letter-spacing: 1px;">Leads</p>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.members.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.members.index') }}">
                    <i class="fa fa-headset me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Inquiries/ Leads</span>
                </a>
            </li>

            <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2"
                style="font-size: 0.7rem; letter-spacing: 1px;">About Us</p>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.teams.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.teams.index') }}">
                    <i class="fa fa-users me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Our Team</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.journeys.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.journeys.index') }}">
                    <i class="fa fa-route me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Our Journey</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.ourpurpose.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.ourpurpose.index') }}">
                    <i class="fa fa-bullseye me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Our Purpose</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.abouts.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.abouts.index') }}">
                    <i class="fa fa-leaf me-3" style="width: 20px;"></i>
                    <span class="fw-medium">About Agriscience</span>
                </a>
            </li>

            <p class="text-uppercase small fw-bold text-muted px-3 mt-4 mb-2"
                style="font-size: 0.7rem; letter-spacing: 1px;">Testimonials</p>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.testimonials.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.testimonials.index') }}">
                    <i class="fa fa-comments me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Testimonials</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center p-3 rounded-4 {{ Route::is('admin.faqs.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-muted' }}"
                    href="{{ route('admin.faqs.index') }}">
                    <i class="fa fa-question-circle me-3" style="width: 20px;"></i>
                    <span class="fw-medium">FAQs</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="sidebar-footer p-4 mt-auto">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="btn btn-light w-100 rounded-4 d-flex align-items-center justify-content-center p-3 shadow-sm border-0">
                <i class="fa fa-sign-out-alt me-2 text-danger"></i>
                <span class="fw-bold text-dark">Logout</span>
            </button>
        </form>
    </div>
</div>

<style>
    .sidebar-menu::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-menu::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar-menu::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .sidebar-menu::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, 0.2);
    }

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