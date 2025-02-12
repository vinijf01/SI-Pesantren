@extends('layouts.main')
@section('content')
    <!-- hero area start here  -->
    <section class="bd-breadcrumb-area p-relative fix theme-bg">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg" data-background="{{ url('assets/img/hero/' . $heroData->image) }}"></div>
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
                                <span>{{ $heroData->nama_pesantren }}</span>
                                <h1 class="bd-breadcrumb-title">{{ $heroData->judul }}</h1>
                                <div class="bd-breadcrumb-list">
                                    <span>- {{ $heroData->ta }}</span>
                                </div>
                                <br>
                                <div class="bd-joining-btn">
                                    <a href="{{ route($heroData->link_btn) }}" class="bd-btn btn-white" target="_blank">
                                        <span class="bd-btn-inner">
                                            <span class="bd-btn-normal">Daftar Sekarang</span>
                                            <span class="bd-btn-hover">Daftar Sekarang</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bd-wave-wrapper bd-wave-wrapper-3" style="height: 80%;">
            <!-- <div class="bd-wave bd-wave-3" style="height: 80%;"></div> -->
            <!-- <div class="bd-wave bd-wave-3" style="height: 80%;"></div> -->
        </div>
    </section>
    <!-- hero area end here  -->

    {{-- Syarat Pendaftaran Start --}}
    <section id="about" class="bd-promotion-area pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bd-section-title-wrapper text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".2s">
                        <h2 class="bd-section-title mb-0">Syarat
                            Pendaftaran</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="bd-promotion mb-60 wow fadeInLeft">
                        <div class="bd-promotion-list mb-50">
                            <ul>
                                @foreach ($syarat as $item)
                                    <li>{{ $item->syarat }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="bd-promotion mb-60 wow fadeInRight">
                        <div class="bd-promotion-list mb-50">
                            <ul>
                                <p>Transfer biaya pendaftaran ke :</p>
                                <p style="margin-bottom: 0px; margin-top:10px">Nama Bank :</p>
                                <b>{{ $bank->nama_bank }}</b>
                                <p style="margin-bottom: 0px; margin-top:10px">Nama Rekening :</p>
                                <b>{{ $bank->nama_rekening }}</b>
                                <p style="margin-bottom: 0px; margin-top:10px">Nomor Rekening :</p>
                                <b>{{ $bank->nomor_rekening }}</b>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- Syarat Pendaftaran End --}}


    {{-- Tata Cara Pendaftaran --}}
    <!-- feature area start here-->
    <div class="bd-feature-area theme-bg pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="bd-section-title-wrapper is-white text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".3s">
                        <h2 class="bd-section-title mb-0">Tata Cara Pendaftaran</h2>
                    </div>
                </div>
            </div>

            <div class="bd-feature-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                <div class="row">
                    <div class="col-12">
                        <ul class="feature">
                            @foreach ($cara_pendaftaran as $item)
                                <li class="feature-item">
                                    <div class="bd-feature first-item">
                                        <div class="bd-feature-content" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $item->id }}"
                                            data-bs-content="{{ $item->deskripsi }}">
                                            <button class="bd-feature-icon icon-4" type="button">
                                                <i class="{{ $item->logo }}"></i>
                                            </button>
                                            <h4 class="bd-feature-title">{{ $item->step }}</h4>
                                            <p>{{ $item->nama_step }}</p>
                                        </div>
                                    </div>

                                    <div class="modal bd-shop-modal fade" id="modal-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modal-{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title d-none" id="exampleModalLabel">
                                                        {{ $item->step }}: {{ $item->nama_step }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="product-side-info mb-60">
                                                                    <p class="mb-30 no-style" style="background: none">
                                                                        {!! html_entity_decode($item->deskripsi) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tata Cara Pendaftaran END --}}

    {{-- Biaya Pendidik Start --}}

    <section class="bd-routine-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bd-section-title-wrapper text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".2s">
                        <h2 class="bd-section-title mb-0">Biaya Pendidikan</h2>
                    </div>
                </div>
            </div>
            @foreach ($biaya_pendidikan as $item)
                <div class="row">
                    <b style="text-align: left; margin-bottom:10px">{{ $item->judul }}</b>
                    <div>{!! $item->deskripsi !!}</div>
                </div>
            @endforeach
        </div>

    </section>
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
                                    <p>Pastikan putra-putri Abu dan Ummu meraih pendidikan terbaik bersama kami,
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

    {{-- Biaya Pendidikan END --}}
@endsection
