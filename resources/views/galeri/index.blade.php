@extends('layouts.main')
@section('content')
    <!-- breadcrumb area start here -->
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
                                <h1 class="bd-breadcrumb-title">Gallery</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('beranda') }}"><i class="flaticon-hut"></i>Beranda</a></span>
                                    <span>Galeri Kegiatan Pesantren Abdurrahman Bin</span>
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
    <!-- breadcrumb area end here  -->

    <!-- gallery area start here  -->

    @php
        $galleryData = [];
    @endphp
    @foreach ($galeri as $item)
        @php
            $galleryData[] = [
                'image' => $item->foto,
            ];
        @endphp
    @endforeach
    <div class="bd-gallery-area p-relative pt-120 pb-95 p-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ url('assets/img/gallery/' . $galleryData[0]['image']) }}"
                                            alt="img not found!" style="width: 918fr; height: 918fr;">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ url('assets/img/gallery/' . $galleryData[0]['image']) }}"
                                            class="popup-image"><i class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ url('assets/img/gallery/' . $galleryData[1]['image']) }}"
                                            alt="img not found!" style="width: 612fr; height: 406fr;">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ url('assets/img/gallery/' . $galleryData[1]['image']) }}"
                                            class="popup-image"><i class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="bd-gallery-thumb-wrapper">
                            <div class="bd-gallery-thumb">
                                <img src="{{ url('assets/img/gallery/' . $galleryData[2]['image']) }}" alt="img not found!"
                                    style="width: 1052fr; height: 1052fr;">
                            </div>
                            <div class="bd-gallery-icon">
                                <a href="{{ url('assets/img/gallery/' . $galleryData[2]['image']) }}" class="popup-image"><i
                                        class="flaticon-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="bd-gallery-thumb-wrapper">
                            <div class="bd-gallery-thumb">
                                <img src="{{ url('assets/img/gallery/' . $galleryData[3]['image']) }}" alt="img not found!"
                                    style="width: 832fr; height: 1052fr;">
                            </div>
                            <div class="bd-gallery-icon">
                                <a href="{{ url('assets/img/gallery/' . $galleryData[3]['image']) }}" class="popup-image"><i
                                        class="flaticon-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="bd-gallery-thumb-wrapper">
                            <div class="bd-gallery-thumb">
                                <img src="{{ url('assets/img/gallery/' . $galleryData[4]['image']) }}" alt="img not found!"
                                    style="width: 1052fr; height: 1052fr;">
                            </div>
                            <div class="bd-gallery-icon">
                                <a href="{{ url('assets/img/gallery/' . $galleryData[4]['image']) }}"
                                    class="popup-image"><i class="flaticon-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="bd-gallery-thumb-wrapper">
                            <div class="bd-gallery-thumb">
                                <img src="{{ url('assets/img/gallery/' . $galleryData[5]['image']) }}"
                                    alt="img not found!">
                            </div>
                            <div class="bd-gallery-icon">
                                <a href="{{ url('assets/img/gallery/' . $galleryData[5]['image']) }}"
                                    class="popup-image"><i class="flaticon-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ url('assets/img/gallery/' . $galleryData[6]['image']) }}"
                                            alt="img not found!">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ url('assets/img/gallery/' . $galleryData[6]['image']) }}"
                                            class="popup-image"><i class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ url('assets/img/gallery/' . $galleryData[7]['image']) }}"
                                            alt="img not found!">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ url('assets/img/gallery/' . $galleryData[7]['image']) }}"
                                            class="popup-image"><i class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery area end here  -->
    <!-- joining area start here  -->
    <section>
        <div class="container">
            <div class="bd-joining-area radius-24 fix pt-100 pb-95 wow fadeInUp" data-wow-duration="1s"
                data-wow-delay=".3s">
                <!-- joiniong bg -->
                <div class="bd-joining-bg" data-background="assets/img/bg/breadcrumb-bg.jpg"></div>
                <!-- joining bg overlay -->
                <div class="bd-joining-bg-overlay"></div>
                <div class="bd-joining">
                    <div class="bd-joining-shape-wrapper d-none d-md-block">
                        <div class="bd-joining-shape-1 p-absolute">
                            <img src="assets/img/shape/white-curved-line.png" alt="img not found!">
                        </div>
                        <div class="bd-joining-shape-2 p-absolute">
                            <img src="assets/img/shape/white-curved-line.png" alt="img not found!">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="bd-joining-content text-center">
                                <div class="bd-section-title-wrapper is-white mb-45">
                                    <h2 class="bd-section-title mb-0">Ayo bergabung bersama <br>Pesantren ABA</h2>
                                    <p>Pastikan putra-putri Abu dan Umu meraih pendidikan terbaik bersama kami,
                                        dengan
                                        mengamalkan pembelajaran yang holistik, mendalam, dan bernilai keislaman
                                        tinggi.</p>
                                </div>
                                <div class="bd-joining-btn" style="display: flex; justify-content: center;">
                                    <a href="{{ route($heroData->link_btn) }}" class="bd-btn btn-white" target="_blank">
                                        <span class="bd-btn-inner">
                                            <span class="bd-btn-normal">Daftar Sekarang</span>
                                            <span class="bd-btn-hover">Daftar Sekarang</span>
                                        </span>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?phone=6282170222271" class="bd-btn bd-btn-grey"
                                        target="_blank">
                                        <span class="bd-btn-inner">
                                            <span class="bd-btn-normal">Hubungi Kami</span>
                                            <span class="bd-btn-hover">Hubungi Kami</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bd-joining-bottom-line -->
                <div class="bd-joining-line"></div>
                <div class="bd-joining-line-2"></div>
            </div>
        </div>
    </section>
    <!-- joining area end here  -->
@endsection
