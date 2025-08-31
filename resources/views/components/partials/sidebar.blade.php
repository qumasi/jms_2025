<div class="sidebar bg-white" id="classicSidebar">
    <div class="brand-area d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <!-- collapse toggle on the left (desktop shows icon-only toggle) -->
                <button class="btn btn-sm btn-light me-1" id="sidebarToggle" aria-label="Collapse sidebar">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <a href="/" class="brand text-decoration-none text-dark d-flex align-items-center">
                    <i class="bi bi-bank2 fs-4 me-2 nav-icon"></i>
                    <span class="fw-bold nav-label">JMS</span>
                </a>
            </div>

            <!-- collapse toggle for small screens -->
            <button class="btn btn-sm btn-light d-lg-none" id="sidebarCollapseBtn" aria-label="Toggle sidebar">
                <i class="bi bi-list"></i>
            </button>
        </div>

    <div class="p-3">
        <div class="mb-2">
            <input type="search" id="sidebarSearch" class="sidebar-search" placeholder="Search modules..." aria-label="Search modules">
        </div>

        <div class="small text-muted mb-2">Modules</div>

        <div class="accordion" id="modulesAccordion">
            @php
                $modules = [
                    ['id' => 'cases','title'=>'Case Management','icon'=>'bi-briefcase-fill','href'=>'/cases','children'=>[
                        ['title'=>'File Case1','href'=>'/manageCase'],
                        ['title'=>'Track Case','href'=>'/cases/track'],
                        ['title'=>'Schedule Hearing','href'=>'/cases/schedule']
                    ]],
                    ['id' => 'docs','title'=>'Document Management','icon'=>'bi-file-earmark-text-fill','href'=>'/documents','children'=>[
                        ['title'=>'Upload Document','href'=>'/documents/upload'],
                        ['title'=>'Verify Document','href'=>'/documents/verify']
                    ]],
                    ['id' => 'scheduling','title'=>'Courtroom Scheduling','icon'=>'bi-calendar-check-fill','href'=>'/scheduling','children'=>[
                        ['title'=>'Schedule Room','href'=>'/scheduling/schedule'],
                        ['title'=>'View Schedule','href'=>'/scheduling/view']
                    ]],
                    ['id' => 'litigant','title'=>'Litigant Portal','icon'=>'bi-person-badge-fill','href'=>'/litigant','children'=>[
                        ['title'=>'Check Status','href'=>'/litigant/status'],
                        ['title'=>'File Complaint','href'=>'/litigant/complaint']
                    ]],
                    ['id' => 'lawyer','title'=>'Lawyer Portal','icon'=>'bi-person-workspace','href'=>'/lawyer','children'=>[
                        ['title'=>'View Cases','href'=>'/lawyer/cases'],
                        ['title'=>'Submit Documents','href'=>'/lawyer/documents']
                    ]],
                    ['id' => 'judges','title'=>'Judges Dashboard','icon'=>'bi-person-video3','href'=>'/judges','children'=>[
                        ['title'=>'View Schedule','href'=>'/judges/schedule'],
                        ['title'=>'Manage Workflow','href'=>'/judges/workflow']
                    ]],
                    ['id' => 'admin','title'=>'Administrative Tools','icon'=>'bi-tools','href'=>'/admin','children'=>[
                        ['title'=>'Manage Staff','href'=>'/admin/staff'],
                        ['title'=>'Manage Roles','href'=>'/admin/roles']
                    ]],
                    ['id' => 'reports','title'=>'Reporting & Analytics','icon'=>'bi-bar-chart-line-fill','href'=>'/reports','children'=>[
                        ['title'=>'View Reports','href'=>'/reports/view'],
                        ['title'=>'Analytics Dashboard','href'=>'/reports/analytics']
                    ]],
                    ['id' => 'search','title'=>'Search & Retrieval','icon'=>'bi-search','href'=>'/search','children'=>[
                        ['title'=>'Search Cases','href'=>'/search/cases'],
                        ['title'=>'Search Documents','href'=>'/search/documents']
                    ]],
                    ['id' => 'security','title'=>'Security & Role Management','icon'=>'bi-shield-lock-fill','href'=>'/security','children'=>[
                        ['title'=>'Manage Access','href'=>'/security/access'],
                        ['title'=>'Data Encryption','href'=>'/security/encryption']
                    ]],
                ];
            @endphp

            @foreach($modules as $mod)
            <div class="accordion-item border-0">
                <h2 class="accordion-header" id="heading-{{ $mod['id'] }}">
                    <a href="{{ $mod['href'] }}" class="accordion-button collapsed text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $mod['id'] }}" aria-expanded="false" aria-controls="collapse-{{ $mod['id'] }}">
                        {{-- <i class="bi {{ $mod['icon'] }} nav-icon"></i> --}}
                        <span class="nav-label">{{ $mod['title'] }}</span>
                    </a>
                </h2>
                <div id="collapse-{{ $mod['id'] }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $mod['id'] }}">
                    <div class="accordion-body px-0">
                        @foreach($mod['children'] as $child)
                            <a href="{{ $child['href'] }}" class="d-block">{{ $child['title'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var collapseBtn = document.getElementById('sidebarCollapseBtn');
    var sidebar = document.getElementById('classicSidebar');
    if(collapseBtn){
        collapseBtn.addEventListener('click', function(){
            sidebar.classList.toggle('active');
        });
    }

    // sidebar search filter
    var search = document.getElementById('sidebarSearch');
    if(search){
        search.addEventListener('input', function(e){
            var q = e.target.value.trim().toLowerCase();
            var items = document.querySelectorAll('#modulesAccordion .accordion-item');
            items.forEach(function(it){
                var title = (it.querySelector('.accordion-button') || {}).textContent || '';
                title = title.trim().toLowerCase();
                if(!q) {
                    it.style.display = '';
                } else if(title.indexOf(q) !== -1) {
                    it.style.display = '';
                } else {
                    // check children
                    var matchesChild = false;
                    it.querySelectorAll('.accordion-body a').forEach(function(ch){
                        if(ch.textContent.toLowerCase().indexOf(q) !== -1) matchesChild = true;
                    });
                    it.style.display = matchesChild ? '' : 'none';
                }
            });
        });
    }
});
</script>
