<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button class="btn btn-link btn-sm d-block d-md-none me-4" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
            @if (Auth::user()->image)
            <img 
            src="{{ asset('storage/' . Auth::user()->image) }}" 
            alt="User Image" 
            class="img-fluid" 
            style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
        
            @else
                <img src="{{ asset('img/use.png') }}" alt="Default User Icon" class="img-fluid" style="max-width: 50px;">
            @endif
            </a>

            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile Saya
                </a>
                {{-- <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a> --}}
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin keluar?')) document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                
            </div>
        </li>

    </ul>

</nav>