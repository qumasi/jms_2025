<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judicial Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        /* Custom animations */
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        
        .mobile-menu {
            animation: slideIn 0.3s ease-out;
        }
        
        /* Custom scrollbar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Mobile menu overlay -->
        <div x-show="mobileMenuOpen" x-cloak class="fixed inset-0 z-40 lg:hidden" style="display: none;">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" x-show="mobileMenuOpen" 
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"></div>

            <div class="relative flex flex-col flex-1 w-full max-w-xs bg-white focus:outline-none mobile-menu"
                 x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full">
                <div class="absolute top-0 right-0 pt-2 -mr-12">
                    <button x-click="mobileMenuOpen = false" class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <i class="fas fa-times text-white text-xl"></i>
                    </button>
                </div>

                <!-- Mobile sidebar content -->
                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto sidebar-scroll">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <div class="h-8 w-8 rounded-md bg-primary-600 flex items-center justify-center mr-3">
                            <i class="fas fa-scale-balanced text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-gray-900">JMS Yemen</h1>
                        </div>
                    </div>
                    <nav class="mt-5 px-2 space-y-1">
                        <!-- Mobile navigation items would go here -->
                        <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-900 bg-gray-100">
                            <i class="fas fa-home mr-4 text-gray-500"></i>
                            Dashboard
                        </a>
                        <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                            <i class="fas fa-folder mr-4 text-gray-400"></i>
                            Case Management
                        </a>
                        <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                            <i class="fas fa-file-contract mr-4 text-gray-400"></i>
                            Documents
                        </a>
                        <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                            <i class="fas fa-calendar-day mr-4 text-gray-400"></i>
                            Scheduling
                        </a>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-800">
                            <span class="text-sm font-medium">JD</span>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">Judge Doe</p>
                            <p class="text-xs font-medium text-gray-500">View profile</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 border-r border-gray-200 bg-white">
                <!-- Logo -->
                <div class="flex items-center h-[70px] flex-shrink-0 px-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="h-8 w-8 rounded-md bg-primary-600 flex items-center justify-center mr-3">
                            <i class="fas fa-scale-balanced text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-gray-900">JMS Yemen</h1>
                            <p class="text-xs text-gray-500">Judicial Management System</p>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Tree -->
                <div class="h-full overflow-y-auto overflow-x-hidden px-4 py-6 sidebar-scroll">
                    <nav class="space-y-1">
                        <!-- Case Management -->
                        <div x-data="{ open: true }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-primary-100">
                                    <i class="fas fa-folder text-primary-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Case Management</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50 transition-all duration-200">
                                    <i class="fas fa-file-import mr-2 text-primary-500"></i>
                                    Case Filing
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50 transition-all duration-200">
                                    <i class="fas fa-tasks mr-2 text-primary-500"></i>
                                    Case Tracking
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50 transition-all duration-200">
                                    <i class="fas fa-calendar-alt mr-2 text-primary-500"></i>
                                    Hearings & Deadlines
                                </a>
                            </div>
                        </div>
                        
                        <!-- Document Management -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-purple-100">
                                    <i class="fas fa-file-contract text-purple-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Document Management</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50 transition-all duration-200">
                                    <i class="fas fa-upload mr-2 text-purple-500"></i>
                                    Document Upload
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50 transition-all duration-200">
                                    <i class="fas fa-shield-alt mr-2 text-purple-500"></i>
                                    Document Verification
                                </a>
                            </div>
                        </div>
                        
                        <!-- Courtroom Scheduling -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-amber-100">
                                    <i class="fas fa-calendar-day text-amber-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Courtroom Scheduling</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50 transition-all duration-200">
                                    <i class="fas fa-gavel mr-2 text-amber-500"></i>
                                    Judge Assignment
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50 transition-all duration-200">
                                    <i class="fas fa-door-open mr-2 text-amber-500"></i>
                                    Room Allocation
                                </a>
                            </div>
                        </div>
                        
                        <!-- Litigant Portal (parent with children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-emerald-100">
                                    <i class="fas fa-user-check text-emerald-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Litigant Portal</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-info-circle mr-2 text-emerald-500"></i>
                                    Check Case Status
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-pen-square mr-2 text-emerald-500"></i>
                                    File Complaint
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-book-open mr-2 text-emerald-500"></i>
                                    Access Court Decisions
                                </a>
                            </div>
                        </div>

                        <!-- Lawyer Portal (parent with children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-emerald-100">
                                    <i class="fas fa-gavel text-emerald-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Lawyer Portal</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-briefcase mr-2 text-emerald-500"></i>
                                    Assigned Cases
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-file-upload mr-2 text-emerald-500"></i>
                                    Submit Documents
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-comments mr-2 text-emerald-500"></i>
                                    Client Communication
                                </a>
                            </div>
                        </div>

                        <!-- Judges' Dashboard (parent with children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-emerald-100">
                                    <i class="fas fa-user-tie text-emerald-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Judges' Dashboard</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-list-alt mr-2 text-emerald-500"></i>
                                    Case List
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-calendar-check mr-2 text-emerald-500"></i>
                                    Schedule & Hearings
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-tasks mr-2 text-emerald-500"></i>
                                    Workflow Management
                                </a>
                            </div>
                        </div>

                        <!-- Administrative Tools (children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-rose-100">
                                    <i class="fas fa-tools text-rose-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Administrative Tools</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-users-cog mr-2 text-rose-500"></i>
                                    Staff Management
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-user-shield mr-2 text-rose-500"></i>
                                    Role & Permission Management
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-tachometer-alt mr-2 text-rose-500"></i>
                                    Performance Metrics
                                </a>
                            </div>
                        </div>

                        <!-- Reporting & Analytics (children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-cyan-100">
                                    <i class="fas fa-chart-bar text-cyan-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Reporting & Analytics</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-file-alt mr-2 text-cyan-500"></i>
                                    Standard Reports
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-chart-pie mr-2 text-cyan-500"></i>
                                    Dashboards
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-file-export mr-2 text-cyan-500"></i>
                                    Export & Scheduling
                                </a>
                            </div>
                        </div>

                        <!-- Search & Retrieval (children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-sky-100">
                                    <i class="fas fa-search text-sky-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Search & Retrieval</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-folder-open mr-2 text-sky-500"></i>
                                    Case Search
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-file-alt mr-2 text-sky-500"></i>
                                    Document Search
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-balance-scale mr-2 text-sky-500"></i>
                                    Judgment Search
                                </a>
                            </div>
                        </div>

                        <!-- External System Integration (children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-indigo-100">
                                    <i class="fas fa-exchange-alt text-indigo-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">External System Integration</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-user-shield mr-2 text-indigo-500"></i>
                                    Police Systems
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-landmark mr-2 text-indigo-500"></i>
                                    Prisons & Corrections
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-id-card mr-2 text-indigo-500"></i>
                                    National ID / Civil Records
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-hands-helping mr-2 text-indigo-500"></i>
                                    Legal Aid Systems
                                </a>
                            </div>
                        </div>

                        <!-- Security & Role Management (children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-yellow-100">
                                    <i class="fas fa-user-shield text-yellow-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Security & Role Management</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-users mr-2 text-yellow-500"></i>
                                    Users
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-user-lock mr-2 text-yellow-500"></i>
                                    Roles & Permissions
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-clipboard-list mr-2 text-yellow-500"></i>
                                    Audit Logs
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-key mr-2 text-yellow-500"></i>
                                    Encryption & Key Management
                                </a>
                            </div>
                        </div>

                        <!-- Local Data Center (children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-gray-100">
                                    <i class="fas fa-server text-gray-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Local Data Center</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-hdd mr-2 text-gray-500"></i>
                                    Backups & Restore
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-network-wired mr-2 text-gray-500"></i>
                                    Network & Infrastructure
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-shield-alt mr-2 text-gray-500"></i>
                                    Compliance & Auditing
                                </a>
                            </div>
                        </div>

                        <!-- Prosecutor's Office Integration (children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-rose-50">
                                    <i class="fas fa-briefcase text-rose-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Prosecutor's Office Integration</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-link mr-2 text-rose-500"></i>
                                    Case Linkage
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-folder-open mr-2 text-rose-500"></i>
                                    Evidence Management
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-user-tie mr-2 text-rose-500"></i>
                                    Prosecutor Portal
                                </a>
                            </div>
                        </div>

                        <!-- Police Department Integration (children) -->
                        <div x-data="{ open: false }" class="mb-2">
                            <button @click="open = !open" class="flex items-center w-full p-3 text-sm rounded-lg group transition-all duration-200 hover:bg-primary-50 text-gray-700">
                                <div class="flex items-center justify-center h-5 w-5 mr-3 rounded-md bg-slate-100">
                                    <i class="fas fa-shield-alt text-slate-600 text-xs"></i>
                                </div>
                                <span class="flex-1 text-left font-medium">Police Department Integration</span>
                                <i :class="open ? 'rotate-90' : ''" class="fas fa-chevron-right text-xs transition-transform duration-200 text-gray-400"></i>
                            </button>
                            <div x-show="open" x-transition class="mt-1 space-y-1 ml-9">
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-file-signature mr-2 text-slate-500"></i>
                                    Case Reporting
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-vial mr-2 text-slate-500"></i>
                                    Evidence Submission
                                </a>
                                <a href="#" class="flex items-center p-2 pl-3 text-sm text-gray-600 rounded-lg hover:bg-primary-50">
                                    <i class="fas fa-user-secret mr-2 text-slate-500"></i>
                                    Investigation Updates
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
                
                <!-- User profile at bottom -->
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <div class="flex items-center w-full">
                        <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-800">
                            <span class="text-sm font-medium">JD</span>
                        </div>
                        <div class="ml-3 flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-700 truncate">Judge Doe</p>
                            <p class="text-xs text-gray-500 truncate">Administrator</p>
                        </div>
                        <button class="text-gray-400 hover:text-gray-500 transition-colors">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden" x-data="{ mobileMenuOpen: false }">
            <!-- Topbar -->
            <header class="bg-white border-b border-gray-200 shadow-sm z-10">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center">
                        <button x-click="mobileMenuOpen = true" class="text-gray-500 focus:outline-none lg:hidden mr-3">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div class="text-lg font-semibold text-gray-800">Judicial Dashboard</div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <!-- Search (hidden on small screens) -->
                        <div class="relative hidden md:block">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" class="w-48 rounded-lg border-gray-300 bg-gray-100 pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500" placeholder="Search cases...">
                        </div>
                        
                        <!-- Mobile search button -->
                        <button class="md:hidden text-gray-500 hover:text-gray-700">
                            <i class="fas fa-search text-xl"></i>
                        </button>
                        
                        <!-- Notifications -->
                        <div class="relative">
                            <button class="relative p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <i class="far fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 flex h-4 w-4 -mt-1 -mr-1">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500 text-xs text-white items-center justify-center">3</span>
                                </span>
                            </button>
                        </div>
                        
                        <!-- User profile dropdown -->
                        <div class="relative">
                            <button class="flex items-center focus:outline-none">
                                <div class="h-9 w-9 rounded-full bg-primary-100 flex items-center justify-center text-primary-800">
                                    <span class="text-sm font-medium">JD</span>
                                </div>
                                <div class="ml-2 hidden md:block">
                                    <p class="text-sm font-medium text-gray-700">Judge Doe</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Main content area (empty as requested) -->
            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50 p-4">
                <!-- Empty main content -->
                @yield('content')
                <div class="flex items-center justify-center h-full">
                    <div class="text-center max-w-md mx-auto">
                        <div class="mb-5">
                            <i class="fas fa-scale-balanced text-6xl text-primary-500 opacity-20"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Judicial Management System</h3>
                        <p class="text-gray-500">Select an option from the sidebar to get started</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>