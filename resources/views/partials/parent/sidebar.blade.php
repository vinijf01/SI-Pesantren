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
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Progress Belajar Santri</span></li>

        <div class="menu-inner-shadow"></div>
        <li class="menu-item {{ $active === 'raport_santri' ? 'active' : '' }}">
            <a href="{{ route('progress-santri.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-open'></i>
                <div data-i18n="Basic">Raport</div>
            </a>
        </li>
        <li class="menu-item {{ $active === 'hafalan_santri' ? 'active' : '' }}">
            <a href="{{ route('progress-santri.create') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-reader'></i>
                <div data-i18n="Basic">Hafalan</div>
            </a>
        </li>
    </ul>
    <div></div>
    <div></div>
</aside>
