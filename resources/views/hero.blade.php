<!-- Hero Area Background -->
<div class="bd-gradient-bg"></div>

<!-- Hero Area Social Links -->
<div class="bd-hero-social-wrapper">
    @isset($heroData->link_fb)
        <div class="bd-hero-social">
            <a href="{{ $heroData->link_fb }}" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-facebook-f"></i> Facebook
            </a>
        </div>
    @endisset

    @isset($heroData->link_ig)
        <div class="bd-hero-social">
            <a href="{{ $heroData->link_ig }}" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-instagram"></i> Instagram
            </a>
        </div>
    @endisset

    @isset($heroData->link_yt)
        <div class="bd-hero-social">
            <a href="{{ $heroData->link_yt }}" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-youtube"></i> YouTube
            </a>
        </div>
    @endisset
</div>

<div class="container">
    <div class="bd-hero-inner-3">
        <div class="bd-hero-shape-wrapper d-none d-lg-block">
            <div class="bd-hero-3-shape-2">
                <img src="{{ asset('assets/img/shape/curved-line-2.png') }}" alt="Shape Decoration">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="bd-hero-content">
                    <span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        {{ $heroData->judul ?? 'Selamat Datang Di' }}
                    </span>
                    <h1 class="bd-hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                        {{ $heroData->isi ?? 'Pesantren Abdurrahman Bin Auf' }}
                    </h1>
                    @php $btnText = $heroData->keterangan_tombol ?? 'Selengkapnya'; @endphp
                    <div class="bd-hero-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                        <a href="{{ $heroData->link_btn ?? '#' }}" class="bd-btn">
                            <span class="bd-btn-inner">
                                <span class="bd-btn-normal">{{ $btnText }}</span>
                                <span class="bd-btn-hover">{{ $btnText }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                @php
                    $imagePath = public_path("assets/img/hero/$heroData->image");
                    $heroImage =
                        !empty($heroData->image) && file_exists($imagePath)
                            ? asset("assets/img/hero/$heroData->image")
                            : asset('assets/img/hero/default-hero.jpg');
                @endphp
                <div id="scene">
                    <div class="bd-hero-thumb-3-wrapper p-relative z-index-1" data-depth=".4">
                        <div class="bd-hero-thumb-3 p-relative">
                            <div class="bd-hero-thumb-3-mask">
                                <img src="{{ $heroImage }}" alt="Hero section image">
                            </div>
                        </div>
                        <div class="bd-hero-thumb-3-shape d-none d-md-block">
                            <div class="bd-hero-thumb-3-shape-1 p-absolute">
                                <img src="{{ asset('assets/img/shape/home-3-shape-1.png') }}" alt="Shape Decoration">
                            </div>
                            <div class="bd-hero-thumb-3-shape-2 p-absolute">
                                <img src="{{ asset('assets/img/shape/home-3-shape-2.png') }}" alt="Shape Decoration">
                            </div>
                            <div class="bd-hero-thumb-3-shape-3 p-absolute">
                                <img src="{{ asset('assets/img/shape/home-3-shape-3.png') }}" alt="Shape Decoration">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Hero Decoration -->
    <div class="bd-hero-3-shape d-none d-lg-block" id="scene2">
        <img data-depth=".5" src="{{ asset('assets/img/shape/hero-3-shape-4.png') }}" alt="Shape Decoration">
    </div>
</div>
