<nav class="navbar navbar-expand-lg navbar-light bg-white topbar mb-4 static-top shadow">

    <div class="container-fluid px-3 d-flex align-items-center">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggle" class="btn btn-link d-lg-none rounded-circle me-2" aria-label="Toggle sidebar">
            <i class="bi bi-list fs-4"></i>
        </button>

        <!-- Page title / breadcrumb -->
        <div class="me-3">
            <h5 class="mb-0">@yield('page_title', 'Dashboard')</h5>
            <small class="text-muted d-none d-md-inline">@yield('page_subtitle')</small>
        </div>

        <!-- Search (center) -->
        <form class="d-none d-md-flex mx-auto w-50">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Search cases, documents, people..." aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <div class="d-flex align-items-center ms-auto gap-2">
            <!-- Notifications -->
            <div class="nav-item dropdown">
                <a class="nav-link position-relative px-2" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="notifDropdown">
                    <li class="dropdown-header">Notifications</li>
                    <li><a class="dropdown-item" href="#">New case filed</a></li>
                    <li><a class="dropdown-item" href="#">Document verified</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item small text-muted" href="#">View all notifications</a></li>
                </ul>
            </div>

            <!-- Quick actions -->
            <div class="d-none d-md-block">
                <a href="#" class="btn btn-sm btn-outline-primary">New Case</a>
            </div>

            <!-- User -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-lg-inline text-dark me-2 small">Douglas McGee</span>
                    <img class="rounded-circle" style="width:40px;height:40px;object-fit:cover" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg" alt="User">
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Activity Log</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

</nav>
