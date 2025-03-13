 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar" style="height: 100vh">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">

        <a class="sidebar-brand brand-logo" href="index.html">
            <img src="{{ asset('assets/images/letter-gate-logo.svg') }} "
                alt="logo" style="width: 180px;"/></a>
                
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset('assets/images/lg.png') }}" alt="logo" style="width: 35px;" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">

                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " 
                        src="{{ Auth::user()->pegawai->foto && file_exists(public_path('storage/foto/' . Auth::user()->pegawai->foto))
                        ? asset('storage/foto/' . Auth::user()->pegawai->foto)
                        : asset('assets/images/profile.jpg') }}" 
                        alt="">
                        <span class="count bg-success"></span>
                    </div> 

                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{Auth::user()->pegawai->nama}}</h5>
                        <span>{{Auth::user()->role}}</span>
                    </div>
                </div>
              
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">________</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('surat.index')}}">
                <span class="menu-icon">
                    <i class="fa fa-envelope"></i>
                </span>
                <span class="menu-title">Surat</span>
            </a>
        </li>
        
        @if(Auth::user()->role == 'admin')
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('devisi.index')}}">
                <span class="menu-icon">
                    <i class="fa fa-suitcase"></i>
                </span>
                <span class="menu-title">Devisi</span>
            
            </a>
        </li>
        @endif

        @if(Auth::user()->role == 'admin')
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('pegawai.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Pegawai</span>
               
            </a>
        </li>
        @endif

        @if(Auth::user()->role == 'admin')
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('users.index')}}">
                <span class="menu-icon">
                    <i class="fa fa-users"></i>
                </span>
                <span class="menu-title">User</span>
                
            </a>
        </li>
        @endif

    
    </ul>
</nav>
<!-- partial -->