<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'JMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bs-primary-rgb: 60, 90, 130;
            --bs-secondary-rgb: 108, 117, 125;
            --sidebar-bg: #ffffff;
            --sidebar-border: #e9ecef;
            --sidebar-link-color: #333;
            --sidebar-link-hover-bg: #f8f9fa;
            --sidebar-active-bg: #eef6ff;
            --sidebar-width: 260px;
            --sidebar-collapsed: 72px;
        }

        body {
            background-color: #f4f7f6;
        }

        /* Modern sidebar with smooth collapse */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background-color: var(--sidebar-bg);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            border-right: 1px solid var(--sidebar-border);
            transition: width 220ms ease, box-shadow 220ms ease;
            box-shadow: none !important;
            overflow-y: auto;
            max-height: 100vh;
            -webkit-overflow-scrolling: touch;
        }

        /* compact (collapsed) sidebar */
        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        /* move page offset to the content wrapper so topbar is pushed right too */
        .flex-grow-1 {
            margin-left: var(--sidebar-width);
            transition: margin-left 220ms ease;
        }

        /* when sidebar is collapsed the content shifts accordingly */
        .sidebar.collapsed + .flex-grow-1 {
            margin-left: var(--sidebar-collapsed);
        }

        .main-content {
            margin-left: 0;
            padding: 1.5rem;
        }

        .sidebar .brand-area {
            padding: 1rem;
            border-bottom: 1px solid var(--sidebar-border);
            background: transparent;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        /* search input in sidebar */
        .sidebar-search {
            width: 100%;
            border-radius: .25rem;
            border: 1px solid var(--sidebar-border);
            padding: .35rem .5rem;
            font-size: .9rem;
        }

        .sidebar .accordion-button {
            padding: .5rem .75rem;
            color: var(--sidebar-link-color);
            background: transparent;
            border: none;
            box-shadow: none;
            font-size: .95rem;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: .5rem;
        }

        .sidebar .accordion-button .nav-label { display: inline-block; }
        .sidebar .accordion-button .nav-icon { width: 22px; text-align: center; }

        /* hide labels when collapsed but keep icons */
        .sidebar.collapsed .nav-label { display: none !important; }

        /* keep collapse chevron aligned to the right */
        .sidebar .accordion-button::after { margin-left: auto; }

        .sidebar .accordion-body a {
            padding: .45rem .9rem;
            display: block;
            color: #495057;
            text-decoration: none;
            border-radius: .25rem;
            margin: .15rem .35rem;
        }

        .sidebar .accordion-body a:hover { background: var(--sidebar-link-hover-bg); }

        .sidebar .accordion-item + .accordion-item { margin-top: .25rem; }

    /*
     Fix: some global CSS (Tailwind/build) may set `.collapse { visibility: collapse }`
     which breaks Bootstrap's collapse show/hide behavior inside the sidebar.
     Scope a small override to restore expected Bootstrap behavior for sidebar accordion.
    */
    .sidebar .collapse { display: none !important; visibility: visible !important; }
    .sidebar .collapse.show { display: block !important; visibility: visible !important; }
    .sidebar .collapsing { height: auto !important; overflow: visible !important; }

        /* topbar tweaks */

        .topbar {
            height: 70px;
            background-color: #fff;
            box-shadow: none !important;
            display: flex;
            align-items: center;
        }

        .topbar .badge { font-size: .65rem; }
        .topbar .input-group .form-control { min-width: 0; }

        @media (max-width: 768px) {
            .topbar .w-50 { width: 100% !important; }
            .topbar form { max-width: 90%; }
        }

        @media (max-width: 992px) {
            .sidebar { margin-left: -260px; }
            .sidebar.active { margin-left: 0; }
            /* when sidebar is active (visible) collapse content margin so it doesn't spill */
            .sidebar.active + .flex-grow-1 { margin-left: 0; }
            .flex-grow-1 { margin-left: 0; }
        }

        /* custom scrollbar for sidebar */
        .sidebar::-webkit-scrollbar { width: 10px; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.08); border-radius: 10px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }

        /* allow hiding shadows for dropdowns and accordion in topbar/sidebar */
        .dropdown-menu, .accordion-button { box-shadow: none !important; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="d-flex">
        @include('partials.sidebar')

        <div class="flex-grow-1">
            @include('partials.topbar')

            <main class="main-content">
                 {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sidebar = document.querySelector('.sidebar');
            var sidebarToggle = document.querySelector('#sidebarToggle');
            var mobileCollapseBtn = document.querySelector('#sidebarCollapseBtn');

            function toggleSidebar() {
                var isMobile = window.matchMedia('(max-width: 992px)').matches;
                if (isMobile) {
                    // mobile: show/hide overlay sidebar
                    sidebar.classList.toggle('active');
                } else {
                    // desktop: collapse to icons-only
                    sidebar.classList.toggle('collapsed');
                }
            }

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    toggleSidebar();
                });
            }

            if (mobileCollapseBtn) {
                mobileCollapseBtn.addEventListener('click', function(e){
                    e.preventDefault();
                    sidebar.classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>
