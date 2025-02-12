<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="overflow-y: auto;">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logo/LogoABA.png') }}" alt
                    class="w-px-40 h-auto rounded-circle mt-2 mb-2" />
            </span>
            <small class="app-brand-text demo menu-text fw-bolder ms-2">Website Akademik Pesantren<br>Abdurrahman Bin
                Auf</small>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ $active === 'admin' ? 'active' : '' }}">
            {{-- <li class="menu-item"> --}}
            <a href="{{ route('dashboard-admin') }}" class="menu-link">
                <i class='menu-icon bx bxs-dashboard'></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- Components -->
        {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Beranda</span></li> --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Front End</span>
        </li>
        <li class="menu-item <?php
        if (isset($active)) {
            if ($active == 'welcome_section') {
                echo $active == 'welcome_section' ? 'active' : '';
            } elseif ($active == 'tentang_pesantren') {
                echo $active == 'tentang_pesantren' ? 'active' : '';
            } elseif ($active == 'faq') {
                echo $active == 'faq' ? 'active' : '';
            } elseif ($active == 'testimoni') {
                echo $active == 'testimoni' ? 'active' : '';
            } elseif ($active == 'ekstrakulikuler') {
                echo $active == 'ekstrakulikuler' ? 'active' : '';
            }
        }
        ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon'></i>
                <div data-i18n="Account Settings">Beranda</div>
            </a>
            <ul class="menu-sub" style="list-style: none; padding-left: 0;">
                <li class="menu-item {{ $active === 'welcome_section' ? 'active' : '' }}" style="list-style: none;">
                    <a href="{{ route('admin-hero.index') }}" class="menu-link">
                        <i class='menu-icon bx bx-home'></i>
                        <div data-i18n="Basic">Welcome Section</div>
                    </a>
                </li>
                <li class="menu-item {{ $active === 'tentang_pesantren' ? 'active' : '' }}">
                    <a href="{{ route('admin-tentang-pesantren.index') }}" class="menu-link">
                        <i class='menu-icon bx bxs-building'></i>
                        <div data-i18n="Authentications">Tentang Pesantren</div>
                    </a>
                </li>
                <li class="menu-item {{ $active === 'faq' ? 'active' : '' }}">
                    <a href="{{ route('admin-faq.index') }}" class="menu-link">
                        <i class='menu-icon bx bx-question-mark'></i>
                        <div data-i18n="Authentications">FAQs</div>
                    </a>
                </li>
                <li class="menu-item {{ $active === 'testimoni' ? 'active' : '' }}">
                    <a href="{{ route('admin-testimoni.index') }}" class="menu-link">
                        <i class='menu-icon bx bx-repost'></i>
                        <div data-i18n="Authentications">Testimoni</div>
                    </a>
                </li>
                <li class="menu-item" {{ $active === 'ekstrakulikuler' ? 'active' : '' }}>
                    <a href="{{ route('admin-ekstrakulikuler.index') }}" class="menu-link">
                        <i class='menu-icon bx bx-ball'></i>
                        <div data-i18n="Authentications">Ekstrakulikuler</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item" {{ $active === 'fasilitas' ? 'active' : '' }}>
            <a href="{{ route('admin-fasilitas.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-school'></i>
                <div data-i18n="Authentications">Fasilitas</div>
            </a>
        </li>
        <li class="menu-item" {{ $active === 'image_fasilitas' ? 'active' : '' }}>
            <a href="{{ route('admin-image-fasilitas.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-school'></i>
                <div data-i18n="Authentications">Foto Fasilitas</div>
            </a>
        </li>

        <li class="menu-item {{ $active === 'berita' ? 'active' : '' }}">
            <a href="{{ route('admin-berita.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-news'></i>
                <div data-i18n="Authentications">Berita</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'galeri' ? 'active' : '' }}">
            <a href="{{ route('admin-galeri.index') }}" class="menu-link">
                <i class='menu-icon bx bx-image'></i>
                <div data-i18n="Authentications">Galeri</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Tentang Kami</span></li>

        <!-- komponen -->
        <li class="menu-item {{ $active === 'visi_misi' ? 'active' : '' }}">
            <a href="{{ route('admin-visi-misi.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-rocket'></i>
                <div data-i18n="Basic">Visi Misi</div>
            </a>
        </li>

        <li class="menu-item {{ $active === 'kata_pengantar' ? 'active' : '' }}">
            <a href="{{ route('admin-kata-pengantar.index') }}" class="menu-link">
                <i class='menu-icon bx bx-id-card'></i>
                <div data-i18n="Basic">Kata Pengantar</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Akademik</span></li>
        <li class="menu-item {{ $active === 'program_akademik' ? 'active' : '' }} ">
            <a href="{{ route('admin-program-akademik.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-school'></i>
                <div data-i18n="Authentications">Program Akademik</div>
            </a>
        </li>

        <li class="menu-item {{ $active === 'ketua-program' ? 'active' : '' }} ">
            <a href="{{ route('admin-ketua-program.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-school'></i>
                <div data-i18n="Authentications"> Ketua Program Akademik</div>
            </a>
        </li>

        <li class="menu-item {{ $active === 'foto_program_akademik' ? 'active' : '' }}">
            <a href="{{ route('admin-foto-kegiatan-program.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-photo-album'></i>
                <div data-i18n="Basic">Foto Kegitan PA</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'keterangan_kelas' ? 'active' : '' }}">
            <a href="{{ route('admin-keterangan-kelas.index') }}" class="menu-link">
                <i class='menu-icon bx bx-building-house'></i>
                <div data-i18n="Basic">Keterangan Kelas</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'jadwal_harian' ? 'active' : '' }}">
            <a href="{{ route('admin-jadwal-harian.index') }}" class="menu-link">
                <i class='menu-icon bx bx-calendar-check'></i>
                <div data-i18n="Basic">Jadwal Harian</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">PPDB</span></li>
        <li class="menu-item {{ $active === 'hero_ppdb' ? 'active' : '' }}">
            <a href="{{ route('admin-hero-ppdb.index') }}" class="menu-link">
                <i class='menu-icon bx bx-home'></i>
                <div data-i18n="Basic">Welcome Page</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'syarat_ppdb' ? 'active' : '' }}">
            <a href="{{ route('admin-ppdb-syarat.index') }}" class="menu-link">
                <i class='menu-icon bx bx-list-check'></i>
                <div data-i18n="Basic">Syarat PPDB</div>
            </a>
        </li>

        <li class="menu-item {{ $active === 'bank' ? 'active' : '' }}">
            <a href="{{ route('admin-ppdb-bank.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-bank'></i>
                <div data-i18n="Basic">Bank</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'cara_pendaftaran' ? 'active' : '' }}">
            <a href="{{ route('admin-ppdb-cara-pendaftaran.index') }}" class="menu-link">
                <i class='menu-icon bx bx-joystick-button'></i>
                <div data-i18n="Basic">Cara Pendaftaran</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'biaya_pendidikan' ? 'active' : '' }}">
            <a href="{{ route('admin-ppdb-biaya-pendidikan.index') }}" class="menu-link">
                <i class='menu-icon bx bx-money'></i>
                <div data-i18n="Basic">Biaya Pendidikan</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'peminat' ? 'active' : '' }}">
            <a href="{{ route('admin-ppdb-peminat.index') }}" class="menu-link">
                <i class='menu-icon bx bx-user-plus'></i>
                <div data-i18n="Basic">Peminat</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'calon_santri' ? 'active' : '' }}">
            <a href="{{ route('admin-ppdb-calon-santri.index') }}" class="menu-link">
                <i class='menu-icon bx bx-user-plus'></i>
                <div data-i18n="Basic">Calon Santri</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Pasca Belajar</span></li>
        <li class="menu-item {{ $active === 'data_santri' ? 'active' : '' }}">
            <a href="{{ route('admin-data-santri.index') }}" class="menu-link">
                <i class='menu-icon bx bx-user-plus'></i>
                <div data-i18n="Basic">Data Santri</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'raport_santri' ? 'active' : '' }}">
            <a href="{{ route('admin-raport-santri.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-open'></i>
                <div data-i18n="Basic">Raport Santri</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'hafalan' ? 'active' : '' }}">
            <a href="{{ route('admin-hafalan-santri.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-reader'></i>
                <div data-i18n="Basic">Hafalan Santri</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>
        {{-- <li class="menu-item {{ $active === 'data_santri' ? 'active' : '' }}">
            <a href="{{ route('raport-calon-santri') }}" class="menu-link">
                <i class='menu-icon bx bx-user-plus'></i>
                <div data-i18n="Basic">Laporan Calon Santri</div>
            </a>
        </li> --}}
        <li class="menu-item {{ $active === 'raport_santri' ? 'active' : '' }}">
            <a href="{{ route('raport-santri-wustho') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-open'></i>
                <div data-i18n="Basic">Laporan Santri Wustho</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'hafalan' ? 'active' : '' }}">
            <a href="{{ route('raport-santri-ulya') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-reader'></i>
                <div data-i18n="Basic">Laporan Santri Ulya</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'hafalan' ? 'active' : '' }}">
            <a href="{{ route('raport-santri-idad') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-reader'></i>
                <div data-i18n="Basic">Laporan Santri Idad</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'hafalan' ? 'active' : '' }}">
            <a href="{{ route('raport-santri-takhosus') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-reader'></i>
                <div data-i18n="Basic">Laporan Santri Takhosus</div>
            </a>
        </li>
    </ul>
    <div></div>
    <div></div>
</aside>
