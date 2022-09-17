<header>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>{{ $gs->title }}</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home') }}"
                    class="nav-item nav-link {{ Request::routeIs('home') ? 'active' : ''}}">Home</a>
                <a href="{{ route('exams') }}"
                    class="nav-item nav-link {{ Request::routeIs('exams') ? 'active' : ''}}">Exams</a>
                <a href="{{ route('show.categories') }}"
                    class="nav-item nav-link {{ Request::routeIs('show.categories') ? 'active' : ''}}">Syllabus</a>
                <a href="{{ route('show.team') }}"
                    class="nav-item nav-link {{ Request::routeIs('show.team') ? 'active' : ''}}">Our Team</a>
                <div class="nav-item dropdown">
                    <a href="#"
                        class="nav-link dropdown-toggle {{ (Request::routeIs('show.about') || Request::routeIs('show.mission')) ? 'active' : ''}}"
                        data-bs-toggle="dropdown">About</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('show.about') }}" class="dropdown-item {{ Request::routeIs('show.about') ? 'active' : ''}}">About Us</a>
                        <a href="{{ route('show.mission') }}" class="dropdown-item {{ Request::routeIs('show.mission') ? 'active' : ''}}">Mission and Vision</a>
                    </div>

                </div>
                <a href="{{ route('show.contact') }}" class="nav-item nav-link {{ Request::routeIs('show.contact') ? 'active' : ''}}">Contact</a>
            </div>
            @if (Auth::guest())
            <a href="{{ route('user.sign.up') }}" class="btn btn-primary py-4 px-lg-4 d-none d-lg-block">Join Now<i
                    class="fa fa-arrow-right ms-3"></i></a>
            @else
            <a href="{{ route('user.logout') }}" class="btn btn-primary py-4 px-lg-4 d-none d-lg-block">Logout<i
                    class="fas fa-sign-out-alt ms-2"></i>

            </a>
            @endif

        </div>
    </nav>
    <!-- Navbar End -->
</header>