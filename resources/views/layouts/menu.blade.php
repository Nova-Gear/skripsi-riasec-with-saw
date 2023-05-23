@if (auth()->user()->hasRole('Mahasiswa'))
    <li class="nav-item">
        <a href="{{ route('user.home') }}" class="nav-link {{ Request::routeIs('user.home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('test') }}" class="nav-link {{ Request::is('user/test*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-puzzle-piece"></i>
            <p>Riasec Test</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('mahasiswa.ukm.index') }}" class="nav-link {{ Request::is('user/ukm*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-university"></i>
            <p>Ukm</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('mahasiswa.ekstra.index') }}"
            class="nav-link {{ Request::is('user/ekstra*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-basketball-ball"></i>
            <p>Ekstrakulkuler</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('mahasiswa.prestasi.index') }}"
            class="nav-link {{ Request::is('user/prestasi*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-trophy"></i>
            <p>Prestasi</p>
        </a>
    </li>
@endif
@if (auth()->user()->hasRole('Admin'))
    <li class="nav-item">
        <a href="{{ route('admin.home') }}" class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('kriteria.index') }}" class="nav-link {{ Request::routeIs('admin/kriteria') ? 'active' : '' }}">
            <i class="nav-icon fas fa-check"></i>
            <p>Kriteria</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>User</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>Role</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('ukm.index') }}" class="nav-link {{ Request::is('admin/ukm*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-university"></i>
            <p>Ukm</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('riasec_tests.index') }}"
            class="nav-link {{ Request::is('admin/riasec_tests*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-puzzle-piece"></i>
            <p>Riasec Test</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('ekstra.index') }}" class="nav-link {{ Request::is('admin/ekstra*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-basketball-ball"></i>
            <p>Ekstrakulkuler</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('prestasi.index') }}" class="nav-link {{ Request::is('admin/prestasi*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-trophy"></i>
            <p>Prestasi</p>
        </a>
    </li>
@endif
