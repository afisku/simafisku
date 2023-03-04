<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('admin/dashboard') }}">
                <p>AL-FITYAN<br>Kubu Raya</p>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AFISKU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Inventaris Barang</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                <a href="{{ route('barang.index') }}" class="nav-link">
                    <i class="fas fa-columns"></i> 
                    <span>Data Barang</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'bantuan-dana-operasional' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('bantuan-dana-operasional.index') }}">
                    <i class="far fa-square"></i>
                    <span>Asal Anggaran</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'ruang' ? 'active' : '' }}">
                <a href="{{ route('ruang.index') }}" class="nav-link">
                    <i class="fas fa-th"></i> 
                    <span>Data Ruangan</span>
                </a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a class="btn btn-danger btn-lg btn-block btn-icon-split" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>
</div>
