<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('/admin') }}"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
                </li>
                <li class="menu-title">
                    <span>Menu utama</span>
                </li>
                <li>
                    <a href="{{ url('/pemasukan-admin') }}"><i class="fas fa-comment-dollar"></i> <span>Pemasukan</span></a>
                </li>
                <li>
                    <a href="{{ url('/pengeluaran-admin') }}"><i class="fas fa-balance-scale"></i> <span>Pengeluaran</span></a>
                </li>
                {{-- <li>
                    <a href="{{ url('/mitra-admin') }}"><i class="fas fa-calendar-day"></i> <span>Mitra</span></a>
                </li>
                <li>
                    <a href="{{ url('/data-user') }}"><i class="fas fa-users"></i> <span>Data User</span></a>
                </li> --}}
                <li>
                    <a href="{{ url('/laporan-admin') }}"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a>
                </li>
                <li>
                    <a href="{{ url('/setting-admin') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
                </li>
                <li class="menu-title">
                    <span>Lainnya</span>
                </li>
                <li>
                    <a href="{{ url('/logout') }}"><i class="fas fa-arrow-circle-right"></i> <span>Keluar</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>
