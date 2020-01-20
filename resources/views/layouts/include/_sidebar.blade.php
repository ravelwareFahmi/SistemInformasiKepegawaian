<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

                {{-- auth untuk pegawai  --}}
                @if (Auth()->user()->role == 'pegawai')

                {{-- link pegawai dan admin --}}
                    <li><a href="/pegawaiProfile" class=""><i class="fas fa-user-tie"></i> <span>Profile</span></a></li>

                {{-- auth untuk admin      --}}
                @endif
                @if (Auth()->user()->role == 'admin')
                    <li><a href="/kepegawaian" class=""><i class="lnr lnr-user"></i> <span>Pegawai</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
