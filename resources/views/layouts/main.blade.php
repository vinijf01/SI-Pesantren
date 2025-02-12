<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pondok Pesantren Abdurrahman Bin Auf</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/LogoABA.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backtotop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon_kindedo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <!-- pre loader area start -->
    <div id="loading">
        <div id="preloader">
            <div class="preloader-thumb-wrap">
                <div class="preloader-thumb">
                    <div class="preloader-border"></div>
                    <img src="{{ asset('assets/img/bg/preloader.png') }}" alt="img not found!">
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

    <!-- header area start -->
    <header>
        <div class="bd-header">
            <!-- header top area start  -->
            {{-- <div class="bd-header-top bd-header-top-2 d-none d-xl-block"> --}}
            <div class="theme-bg bd-header-top-3 p-relative d-none d-lg-block">

                <!-- header top clip shape  -->
                <div class="bd-header-top-clip-shape"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bd-header-top-wrapper d-flex justify-content-between">
                                <div class="bd-header-top-left">
                                    <div class="bd-header-meta-items-2  d-flex align-items-center">
                                        <div class="bd-header-meta-item d-flex align-items-center">
                                            <div class="bd-header-meta-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="bd-header-meta-text">
                                                <p><a href="https://www.google.com/maps/search/?api=1&query=Pondok+Pesantren+Abdurrahman+Bin+Auf,+Ujung+Batu,+Rokan+Hulu,+Riau"
                                                        target="_blank">
                                                        Jl. Lkr. Durian Sebatang, Suka Damai, Kec. Ujung Batu, Kabupaten
                                                        Rokan Hulu, Riau 28557
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bd-header-top-right d-flex align-items-center">
                                    <div class="bd-header-meta-items d-flex align-items-center">
                                        <div class="bd-header-meta-item d-flex align-items-center">
                                            <div class="bd-header-meta-icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="bd-header-meta-text">
                                                <p><a
                                                        href="mailto:abdurrahmanbinauf.roqiyah@gmail.com
                                                    ">abdurrahmanbinauf.roqiyah@gmail.com
                                                    </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top area end -->

            <!-- header bottom area start -->
            <div id="header-sticky" class="bd-header-bottom-2">
                <!-- header bottom clip shape  -->
                <div class="bd-header-bottom-clip-shape"></div>
                <div class="container">
                    <div class="mega-menu-wrapper p-relative">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="bd-header-logo">
                                <a href="{{ route('beranda') }}">
                                    <img src="{{ asset('assets/img/logo/LogoABA.png') }}" alt="logo">
                                </a>
                            </div>
                            <div class="bd-main-menu  d-none d-lg-flex align-items-center">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('beranda') }}" id="beranda">Beranda</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="#">Tentang Kami</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('visi.misi') }}">Visi Misi</a></li>
                                                <li><a href="{{ route('yayasan') }}">Yayasan</a>
                                                </li>
                                                <li><a href="{{ route('sekolah') }}">Pesantren</a></li>
                                            </ul>
                                        </li>

                                        <li class="has-dropdown has-mega-menu">
                                            <a href="#">Akademik</a>
                                            <ul class="mega-menu mega-menu-2">
                                                <li>
                                                    <a href="javascript:void(0);" class="d-lg-none">List 1</a>
                                                    <ul>
                                                        <li> <a href="{{ route('program-akademik', 1) }}"
                                                                class="mega-program">
                                                                <div class="mega-menu-2-inner-num"><span>01</span>
                                                                </div>
                                                                <div class="mega-menu-2-inner-title">
                                                                    <h6>PKPPS Tingkat Wustho</h6>
                                                                    <span>Setingkat SMP/MTs/Sederajat</span>
                                                                </div>
                                                            </a></li>
                                                        <li> <a href="{{ route('program-akademik', 2) }}"
                                                                class="mega-program">
                                                                <div class="mega-menu-2-inner-num"><span>02</span>
                                                                </div>
                                                                <div class="mega-menu-2-inner-title">
                                                                    <h6>PKPPS Tingkat Ulya</h6>
                                                                    <span>Setingkat MA/SMA/Sederajat</span>
                                                                </div>
                                                            </a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="d-lg-none">List 2</a>
                                                    <ul>
                                                        <li> <a href="{{ route('program-akademik', 3) }}"
                                                                class="mega-program">
                                                                <div class="mega-menu-2-inner-num"><span>03</span>
                                                                </div>
                                                                <div class="mega-menu-2-inner-title">
                                                                    <h6>Takhosus Al-Qur'an</h6>
                                                                    <span>Program Hafalan Al-Qur'an</span>
                                                                </div>
                                                            </a></li>
                                                        <li> <a href="{{ route('program-akademik', 4) }}"
                                                                class="mega-program">
                                                                <div class="mega-menu-2-inner-num"><span>04</span>
                                                                </div>
                                                                <div class="mega-menu-2-inner-title">
                                                                    <h6>I'dad Ulya</h6>
                                                                    <span>Program Persiapan Bahasa Berlanjut Ulya</span>
                                                                </div>
                                                            </a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="{{ route('fasilitas') }}">Fasilitas</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="#">Berita</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('berita') }}">Berita Terbaru</a></li>
                                                <li><a href="{{ route('galeri') }}">Galeri</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="#">Pendaftaran</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('ppdb') }}">Info Pendaftaran</a></li>
                                                <li><a href="{{ route('404') }}">Info Beasiswa</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('kontak') }}">Kontak</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="bd-header-bottom-right d-flex justify-content-end align-items-center">
                                <div class="bd-header-btn d-xl-block">
                                    <a href="{{ route('parent-login') }}" class="bd-btn" target="_blank">
                                        <span class="bd-btn-inner">
                                            <span class="bd-btn-normal">Masuk</span>
                                            <span class="bd-btn-hover">Masuk</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="header-hamburger">
                                    <button type="button" class="hamburger-btn offcanvas-open-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header bottom area end -->
        </div>
    </header>
    <!-- header area end here -->

    @yield('content')

    <a href="https://api.whatsapp.com/send?phone=6282170222271" class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>
    <!-- footer area start -->
    <footer>
        <div class="bd-footer-area fix pt-170 theme-bg-12">
            <div class="bd-wave-wrapper theme-bg-12">
                <div class="bd-wave theme-bg-12"></div>
                <div class="bd-wave theme-bg-12"></div>
            </div>
            <div class="theme-bg-12 bd-footer-wrapper p-relative pt-60">
                <div class="container">
                    <!-- footer area bg here  -->
                    {{-- <div class="bd-footer-bg-2" data-background="{{ asset('assets/img/bg/bg-shape.jpg') }}"></div> --}}
                    <div class=""></div>
                    <div class="bd-footer-top">
                        <div class="row align-items-end">
                            <div class="col-lg-6">
                                <div class="bd-footer-top-widget-1 mb-60">
                                    <div class="bd-footer-logo mb-15">
                                        <a href="#"> <img src="{{ asset('assets/img/logo/LogoABA.png') }}"
                                                alt="img not found!"></a>
                                    </div>
                                    <div class="bd-footer-widget-content is-white mb-40">
                                        <p>Mencetak generasi rabbani, berakhlah Qur'ani dan Cinta NKRI.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="bd-newsletter-content-2 p-relative z-index-1 mb-60">
                                    <h4 class="bd-footer-widget-title is-white mb-20">Hubungi Kami</h4>
                                    <div class="bd-footer-contact is-white">
                                        <ul>
                                            <li><i class="fa-light fa-location-dot"></i><a
                                                    href="https://www.google.com/maps/search/?api=1&query=Pondok+Pesantren+Abdurrahman+Bin+Auf,+Ujung+Batu,+Rokan+Hulu,+Riau"
                                                    target="__blank">Jl.
                                                    Durian
                                                    Sebatang Suka Damai, Ujung Batu</a></li>
                                            <li><i class="fa-light fa-phone"></i><a
                                                    href="tel:6282170222271">+62-8217-0222-271</a></li>
                                            <li><i class="fa-light fa-envelope"></i><a
                                                    href="mailto:abdurrahmanbinauf.roqiyah@gmail.com
                                                    ">abdurrahmanbinauf.roqiyah@gmail.com
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bd-footer-2 pb-15 pt-60 p-relative">
                        <div class="bd-footer-shape d-none d-lg-block">
                            <img src="{{ asset('assets/img/shape/white-curved-line.png') }}" alt="img not found!">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="bd-footer-widget-2 mb-50">
                                    <div class="bd-footer-widget-content">
                                        <div class="bd-footer-list bd-footer-list-2">
                                            <ul>
                                                <li><a href="#">Beranda</a></li>
                                                <li><a href="#">Tentang Kami</a></li>
                                                <li><a href="#">Akademik</a></li>
                                                <li><a href="#">Fasilitas</a></li>
                                                <li><a href="#">Berita</a></li>
                                                <li><a href="{{ route('kontak') }}">Kontak</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="bd-footer-widget-2 mb-50">
                                    <div class="bd-footer-widget-content">
                                        <h4 class="bd-footer-widget-title is-white mb-20">Program</h4>
                                        <div class="bd-footer-list bd-footer-list-2">
                                            <ul>
                                                <li><a href="{{ route('program-akademik', 1) }}">PKPPS Tingkat
                                                        Wustho</a></li>
                                                <li><a href="{{ route('program-akademik', 2) }}">PKPPS Tingkat
                                                        Ulya</a></li>
                                                <li><a href="{{ route('program-akademik', 3) }}">Takhosus Al-Qur'an
                                                    </a></li>
                                                <li><a href="{{ route('program-akademik', 4) }}">I'dad Ulya</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="bd-footer-widget-2 mb-50">
                                    <div class="bd-footer-widget-content">
                                        <h4 class="bd-footer-widget-title is-white mb-20">Media Sosial</h4>
                                        <div class="bd-footer-list bd-footer-list-2">
                                            <!-- hero area side social  -->
                                            <div class="bd-footer-social-wrapper is-white">
                                                <div class="bd-footer-social">
                                                    <a href="https://web.facebook.com/ponpesabdurrahmanbinauf/?locale=id_ID&_rdc=1&_rdr"
                                                        target="__blank"><i
                                                            class="fa-brands fa-facebook-f"></i>facebook</a>
                                                </div>
                                                <div class="bd-footer-social">
                                                    <a href="https://www.instagram.com/ponpes_abdurrahman_bin_auf/?igsh=bnR0MWwzczFrMDVn"
                                                        target="__blank"><i
                                                            class="fa-brands fa-instagram"></i>instagram</a>
                                                </div>
                                                <div class="bd-footer-social">
                                                    <a href="#"><i class="fa-brands fa-youtube"></i>youtube</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="bd-footer-copyright pb-5 pt-25">
                        <div class="bd-footer-copyright-wrap d-flex justify-content-center">
                            <div class="bd-footer-copyright-text is-white pb-20">
                                <p>Copyrighted by &copy;2023 <a>Pesantren Abdurrahman Bin Auf</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__bg"></div>
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo">
                        <a href="#">
                            <img src="{{ asset('assets/img/logo/LogoABA.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button class="offcanvas__close-btn">
                            <i class="fa-thin fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="offcanvas__search mb-0">
                    <form action="#">
                        <button type="submit"><i class="flaticon-search"></i></button>
                        <input type="text" placeholder="Search here">
                    </form>
                </div>
                <div class="mobile-menu fix mt-40"></div>
                <div class="offcanvas__about d-none d-lg-block mt-30 mb-30">
                    <h4>Tentang Pesantren</h4>
                    <p>Pondok Pesantren Abdurrahman bin Auf adalah lembaga pendidikan Islam yang berkomitmen untuk
                        mencetak generasi qurani, cerdas, dan berakhlak mulia. Kami memiliki program pendidikan yang
                        komprehensif, meliputi pendidikan agama, bahasa Arab, dan ilmu pengetahuan umum.</p>
                </div>
                <div class="offcanvas__contact mt-30 mb-30">
                    <h4>Contact Info</h4>
                    <ul>
                        <li class="d-flex align-items-center gap-2">
                            <div class="offcanvas__contact-icon">
                                <a target="_blank"
                                    href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">
                                    <i class="fal fa-map-marker-alt"></i></a>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank"
                                    href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">Jl.
                                    Lkr. Durian Sebatang, Suka Damai, Kec. Ujung Batu, Kabupaten Rokan Hulu, Riau
                                    28557</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <div class="offcanvas__contact-icon">
                                <a href="tel:082170222271"><i class="far fa-phone"></i></a>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:6282170222271">+62-8217-0222-271</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <div class="offcanvas__contact-icon">
                                <a href="mailto:abdurrahmanbinauf.roqiyah@gmail.com"><i
                                        class="fal fa-envelope"></i></a>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a
                                    href="mailto:abdurrahmanbinauf.roqiyah@gmail.com">abdurrahmanbinauf.roqiyah@gmail.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas__social">
                    <ul>
                        <li><a target="_blank"
                                href="https://web.facebook.com/ponpesabdurrahmanbinauf/?locale=id_ID&_rdc=1&_rdr"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a target="_blank"
                                href="https://www.instagram.com/ponpes_abdurrahman_bin_auf/?igsh=bnR0MWwzczFrMDVn"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a target="_blank" href="https://www.youtube.com/"><i
                                    class="fa-brands fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- serach popup area start here  -->
    <div class="bd-search-popup-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bd-search-popup">
                        <div class="bd-search-form">
                            <form action="#">
                                <div class="bd-search-input">
                                    <input type="search" placeholder="Type here to serach ...">
                                    <div class="bd-search-submit">
                                        <button type="submit"><i class="flaticon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div class="bd-search-close">
                                <div class="bd-search-close-btn">
                                    <button><i class="fa-thin fa-close"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search popup overlay  -->
    <div class="bd-search-overlay"></div>
    <!-- serach popup area end here  -->

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/parallax.js') }}"></script>
    <script src="{{ asset('assets/js/backtotop.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }} "></script>
    <script src="{{ asset('assets/js/form-editor.init.js') }} "></script>
    <script type="text/javascript">
        tinymce.init({
            theme => 'modern',
            selector: "textarea",

            plugins: [

                "advlist autolink lists link image charmap print preview anchor",

                "searchreplace visualblocks code fullscreen",

                "insertdatetime media table contextmenu paste"

            ],

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | tinymce-light"

        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
