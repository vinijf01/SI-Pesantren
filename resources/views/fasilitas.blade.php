@extends('layouts.main')
@section('content')
    <section class="bd-breadcrumb-area p-relative fix theme-bg">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg" data-background="assets/img/bg/breadcrumb-bg.jpg"></div>
        <div class="bd-breadcrumb-wrapper mb-60 p-relative">
            <div class="container">
                <div class="bd-breadcrumb-shape d-none d-sm-block p-relative">
                    <div class="bd-breadcrumb-shape-1">
                        <img src="assets/img/shape/curved-line-2.png" alt="img not found!">
                    </div>
                    <div class="bd-breadcrumb-shape-2">
                        <img src="assets/img/shape/white-curved-line.png" alt="img not found!">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">Fasilitas</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('beranda') }}"><i class="flaticon-hut"></i>Beranda</a></span>
                                    <span>Fasilitas Pondok Pesantren Abdurrahman Bin Auf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bd-wave-wrapper bd-wave-wrapper-3">
            <div class="bd-wave bd-wave-3"></div>
            <div class="bd-wave bd-wave-3"></div>
        </div>
    </section>
    <section class="bd-gallery-area p-relative pt-120 pb-60 p-relative">
        @foreach ($fasilitas as $item)
            <div class="container">
                <div class="row justify-content-center">
                    <div>
                        <div class="bd-section-title-wrapper mb-55 text-center wow fadeInUp" data-wow-duration="1s"
                            data-wow-delay=".3s">
                            <h2 class="bd-section-title mb-0">{{ $item->nama }}</h2>
                            <p>{{ $item->keterangan }}.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="bd-gallery-active swiper-container wow fadeInUp" data-wow-duration="1s"
                            data-wow-delay=".5s">
                            <div class="swiper-wrapper">
                                @foreach ($item->images as $image)
                                    <div class="swiper-slide">
                                        <div class="bd-gallery">
                                            <div class="bd-gallery-thumb-wrapper">
                                                <div class="bd-gallery-thumb">
                                                    <img src="{{ url('assets/img/fasilitas/' . $image->image) }}"
                                                        alt="img not found!">
                                                </div>
                                                <div class="bd-gallery-icon">
                                                    <a href="{{ url('assets/img/fasilitas/' . $image->image) }}"
                                                        class="popup-image"><i class="flaticon-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- program slider dots pagination  -->
                        <div class="bd-gallery-pagination bd-dots-pagination fill-pagination wow fadeInUp"
                            data-wow-duration="1s" data-wow-delay=".4s"></div>
                    </div>
                </div>
            </div><br><br>
        @endforeach

    </section>
@endsection
