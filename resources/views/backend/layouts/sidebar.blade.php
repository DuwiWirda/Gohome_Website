<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/kamar">
                <i class="bi bi-door-open"></i>
                <span>Kamar</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/pengunjung">
                <i class="bi bi-file-earmark-person"></i>
                <span>Pengunjung</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/transaksi">
                <i class="bi bi-cart-check"></i>
                <span>Transaksi</span>
            </a>
        </li><!-- End Contact Page Nav -->
        @if (auth()->user()->role == 'super')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/petugas">
                    <i class="bi bi-person"></i>
                    <span>Petugas</span>
                </a>
            </li><!-- End Register Page Nav -->
        @endif
        @if (auth()->user()->role == 'super')
        <li class="nav-item">
            <a class="nav-link collapsed" href="/laporan">
                <i class="bi bi-journal-text"></i>
                <span>Laporan</span>
            </a>
        </li>
        @endif
        <!-- End Login Page Nav -->
    </ul>

</aside><!-- End Sidebar-->
