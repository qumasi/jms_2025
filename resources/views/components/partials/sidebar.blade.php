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
                    ['id' => 'cases','title'=>'Case Management','icon'=>'bi-briefcase-fill','children'=>['File Case','Track Case','Schedule Hearing']],
                    ['id' => 'docs','title'=>'Document Management','icon'=>'bi-file-earmark-text-fill','children'=>['Upload Document','Verify Document']],
                    ['id' => 'scheduling','title'=>'Courtroom Scheduling','icon'=>'bi-calendar-check-fill','children'=>['Schedule Room','View Schedule']],
                    ['id' => 'litigant','title'=>'Litigant Portal','icon'=>'bi-person-badge-fill','children'=>['Check Status','File Complaint']],
                    ['id' => 'lawyer','title'=>'Lawyer Portal','icon'=>'bi-person-workspace','children'=>['View Cases','Submit Documents']],
                    ['id' => 'judges','title'=>'Judges Dashboard','icon'=>'bi-person-video3','children'=>['View Schedule','Manage Workflow']],
                    ['id' => 'admin','title'=>'Administrative Tools','icon'=>'bi-tools','children'=>['Manage Staff','Manage Roles']],
                    ['id' => 'reports','title'=>'Reporting & Analytics','icon'=>'bi-bar-chart-line-fill','children'=>['View Reports','Analytics Dashboard']],
                    ['id' => 'search','title'=>'Search & Retrieval','icon'=>'bi-search','children'=>['Search Cases','Search Documents']],
                    ['id' => 'security','title'=>'Security & Role Management','icon'=>'bi-shield-lock-fill','children'=>['Manage Access','Data Encryption']],
                ];
            @endphp

            @foreach($modules as $mod)
            <div class="accordion-item border-0">
                <h2 class="accordion-header" id="heading-{{ $mod['id'] }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $mod['id'] }}" aria-expanded="false" aria-controls="collapse-{{ $mod['id'] }}">
                        {{-- <i class="bi {{ $mod['icon'] }} nav-icon"></i> --}}
                        <span class="nav-label">{{ $mod['title'] }}</span>
                    </button>
                </h2>
                <div id="collapse-{{ $mod['id'] }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $mod['id'] }}">
                    <div class="accordion-body px-0">
                        @foreach($mod['children'] as $child)
                            <a href="#" class="d-block">{{ $child }}</a>
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
