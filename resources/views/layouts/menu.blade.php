<div class="deznav-scroll">
    <ul class="metismenu" id="menu">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*')||Request::is('home*') ? 'active' : '' }}">
                <i class="fa fa-home"></i>
                <span class="nav-text">Home</span>
            </a>
        </li>
        @role('Admin')
        <li class="nav-item">
            <a href="{{ route('kelas.index') }}" class="nav-link {{ Request::is('kelas*') ? 'active' : '' }}">
                <i class="fa fa-school"></i>
                <span class="nav-text">Kelas</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('mapels.index') }}" class="nav-link {{ Request::is('mapels*')||Request::is('mapels.guruPengampu*') ? 'active' : '' }}">
                <i class="fa fa-book" style="padding-right: 8px"></i>
                <span class="nav-text">Mata Pelajaran</span>
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('jadwals.index') }}"
               class="nav-link {{ Request::is('jadwals*') ? 'active' : '' }}">
               <i class="fa fa-calendar-alt" style="padding-right: 7px"></i>
                <span class="nav-text">Jadwal</span>
            </a>
        </li> --}}

        <li class="submenu">
            <a href="javascript;" class="has-arrow ai-icon">
                <i class="fa fa-user-cog"></i>
                <span class="nav-text">Setting User</span>
            </a>
            <ul>
                <li class="nav-item">
                    <a href="{{ route('gurus.index') }}" class="nav-link {{ Request::is('gurus*') ? 'active' : '' }}">
                        <i class="fa fa-chalkboard-teacher"></i>
                        <span class="nav-text">Guru</span>
                    </a>
                </li>
        
                <li class="nav-item">
                    <a href="{{ route('siswas.index') }}" class="nav-link {{ Request::is('siswas*') ? 'active' : '' }}">
                        <i class="fa fa-users"></i>
                        <span class="nav-text">Siswa</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('jadwalUploads.index') }}" class="nav-link {{ Request::is('jadwalUploads*') ? 'active' : '' }}">
               <i class="fa fa-calendar-alt" style="padding-right: 7px"></i>
                <span>Jadwal Upload</span>
            </a>
        </li>
        @endrole

        @role('Guru')
        <li class="nav-item">
            <a href="{{ route('gurus.index') }}" class="nav-link {{ Request::is('gurus*') ? 'active' : '' }}">
                <i class="fa fa-chalkboard-teacher"></i>
                <span class="nav-text">Guru</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('nilais.index') }}" class="nav-link {{ (request()->routeIs('nilais*')) ? 'active' : '' }}">
                <i class="far fa-address-book" style="padding-right: 7px"></i>
                <span class="nav-text">Nilai</span>
            </a>
        </li>
        @if(Auth::user()->gurus->id_kelas_wali != null)
        <li class="nav-item">
            <a href="{{ route('rapots.index') }}" class="nav-link {{ Request::is('rapots*') ? 'active' : '' }}">
                <i class="fa fa-book"></i>
                <span class="nav-text">Rapot</span>
            </a>
        </li>
        @endif

        
        @endrole

        @role('Siswa')
        <li class="nav-item">
            <a href="{{ route('siswas.index') }}" class="nav-link {{ Request::is('siswas*') ? 'active' : '' }}">
                <i class="fa fa-users"></i>
                <span class="nav-text">Siswa</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('nilais.index') }}" class="nav-link {{ (request()->routeIs('nilais*')) ? 'active' : '' }}">
                <i class="far fa-address-book" style="padding-right: 7px"></i>
                <span class="nav-text">Nilai</span>
            </a>
        </li>
            <li class="nav-item">
                <a href="{{ route('rapots.index') }}" class="nav-link {{ Request::is('rapots*') ? 'active' : '' }}">
                    <i class="fa fa-book"></i>
                    <span class="nav-text">Rapot</span>
                </a>
            </li>
        @endrole
    </ul>
</div>