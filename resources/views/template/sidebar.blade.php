<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Pakuwon</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="bi bi-house-door"></i>
            <span>Dashboard</span></a>
    </li>

    @if (Auth::user()->kategory_id ===  1)
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="true" aria-controls="collapseUser">
            <i class="bi bi-person-fill-gear"></i>
            <span>User Management</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('users.index') }}">User</a>
                <a class="collapse-item" href="{{ route('kategori.index') }}">User Kategori</a>
            </div>
        </div>
    </li>
@endif

    

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-clipboard2-data"></i>
            <span>Data seluruh warga</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{route('data.index')}}">Data Warga</a>
                <a class="collapse-item" href="{{route('pekerjaan.index')}}">Pekarjaan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurat"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-file-earmark-text"></i>
            <span>Pelayanan Surat Warga</span>
        </a>
        <div id="collapseSurat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Surat:</h6>
                <a class="collapse-item" href="{{route('surat.index')}}">Permintaan Surat</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDokument"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-folder"></i>
            <span>Documen</span>
        </a>
        <div id="collapseDokument" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Dokument</h6>
                <a class="collapse-item" href="{{route('document.index')}}">Dokument</a>
                <a class="collapse-item" href="{{route('jenis.index')}}">Jenis Dokument</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-2">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>