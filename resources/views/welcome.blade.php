@extends('layouts.main')
@section('content')
    <!-- main area start here  -->
    <main>
        <!-- hero area start here  -->
        {{-- <section class="bd-hero-area-2 p-relative"> --}}
        <section class="bd-hero-area bd-hero-area-3 fix">

            @include('hero')

        </section>
        <!-- hero area end here  -->


        <!-- About Pesantren area start here  -->
        <section id="about" class="bd-promotion-area pt-120 pb-60">

            @include('about_pesantren')

        </section>
        <!-- About pesantren area end here  -->

        <!-- Program Akademik area start here -->
        <section class="bd-class-area pt-120 pb-120">

            @include('program_akademik')

        </section>
        <!-- Program Akademik area end here -->



        <!-- Program Tambahan area start here  -->
        <section class="bd-program-area-2 p-relative fix theme-bg-6 pt-120 pb-120">

            @include('tambahan')
        </section>
        <!-- Program tambahan area end here -->

        <!-- faq area start here  -->
        <section class="bd-faq-area pt-120 pb-60">
            @include('faq')
        </section>
        <!-- faq area end here  -->

        <!-- Tenaga Pendidik area start here  -->
        {{-- <section class="bd-teacher-area-2 theme-bg">
            <div class="container">
                <div class="bd-teacher-bg-wrapper pt-120 pb-120 p-relative">
                    <div class="bd-teacher-bg d-none d-xl-block"
                        data-background="{{ asset('assets/img/bg/teacher-bg.jpg') }}"></div>
                    <div class="bd-teacher-overlay"></div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="bd-section-title-wrapper z-index-1 p-relative is-white text-center mb-55 wow fadeInUp"
                                data-wow-duration="1s" data-wow-delay=".2s">
                                <h2 class="bd-section-title mb-0">Our Best Teachers</h2>
                                <p>With the help of teachers and the environment as the third teacher, students<br> have
                                    opportunities to confidently take risks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="bd-teacher-wrapper">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="bd-teacher-2 p-relative z-index-1 mb-40 wow fadeInUp"
                                            data-wow-duration="1s" data-wow-delay=".4s">
                                            <div class="bd-teacher-thumb-wrapper-2 mb-20 p-relative">
                                                <a href="teacher-details.html">
                                                    <div class="bd-teacher-thumb-2">
                                                        <img src="{{ asset('assets/img/teacher/7.jpg') }}"
                                                            alt="Image not found">
                                                    </div>
                                                </a>
                                                <div class="bd-teacher-social-2">
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="https://www.youtube.com/"><i
                                                                    class="fa-brands fa-youtube"></i></a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://twitter.com/"><i
                                                                    class="fa-brands fa-twitter"></i></a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://www.facebook.com/"><i
                                                                    class="fa-brands fa-facebook-f"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="bd-teacher-content-wrapper-2">
                                                <div class="bd-teacher-content-2 text-center">
                                                    <h4 class="bd-teacher-title-2 mb-5"><a
                                                            href="teacher-details.html">Cristina r.
                                                            Hick</a>
                                                    </h4>
                                                    <span class="bd-teacher-des is-white">Teacher</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="bd-teacher-2 p-relative z-index-1 mb-40 wow fadeInUp"
                                            data-wow-duration="1s" data-wow-delay=".5s">
                                            <div class="bd-teacher-thumb-wrapper-2 mb-20 p-relative">
                                                <a href="teacher-details.html">
                                                    <div class="bd-teacher-thumb-2">
                                                        <img src="{{ asset('assets/img/teacher/8.jpg') }}"
                                                            alt="Image not found">
                                                    </div>
                                                </a>
                                                <div class="bd-teacher-social-2">
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="https://www.youtube.com/"><i
                                                                    class="fa-brands fa-youtube"></i></a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://twitter.com/"><i
                                                                    class="fa-brands fa-twitter"></i></a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://www.facebook.com/"><i
                                                                    class="fa-brands fa-facebook-f"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="bd-teacher-content-wrapper-2">
                                                <div class="bd-teacher-content-2 text-center">
                                                    <h4 class="bd-teacher-title-2 mb-5"><a href="teacher-details.html">Anna
                                                            D.Brown</a>
                                                    </h4>
                                                    <span class="bd-teacher-des is-white">Teacher</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="bd-teacher-2 p-relative z-index-1 mb-40 wow fadeInUp"
                                            data-wow-duration="1s" data-wow-delay=".6s">
                                            <div class="bd-teacher-thumb-wrapper-2 mb-20 p-relative">
                                                <a href="teacher-details.html">
                                                    <div class="bd-teacher-thumb-2">
                                                        <img src="{{ asset('assets/img/teacher/6.jpg') }}"
                                                            alt="Image not found">
                                                    </div>
                                                </a>
                                                <div class="bd-teacher-social-2">
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="https://www.youtube.com/"><i
                                                                    class="fa-brands fa-youtube"></i></a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://twitter.com/"><i
                                                                    class="fa-brands fa-twitter"></i></a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://www.facebook.com/"><i
                                                                    class="fa-brands fa-facebook-f"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="bd-teacher-content-wrapper-2">
                                                <div class="bd-teacher-content-2 text-center">
                                                    <h4 class="bd-teacher-title-2 mb-5"><a
                                                            href="teacher-details.html">Aleena
                                                            Jyrod</a>
                                                    </h4>
                                                    <span class="bd-teacher-des is-white">Teacher</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="bd-teacher-2 p-relative z-index-1 mb-40 wow fadeInUp"
                                            data-wow-duration="1s" data-wow-delay=".7s">
                                            <div class="bd-teacher-thumb-wrapper-2 mb-20 p-relative">
                                                <a href="teacher-details.html">
                                                    <div class="bd-teacher-thumb-2">
                                                        <img src="{{ asset('assets/img/teacher/5.jpg') }}"
                                                            alt="Image not found">
                                                    </div>
                                                </a>
                                                <div class="bd-teacher-social-2">
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="https://www.youtube.com/"><i
                                                                    class="fa-brands fa-youtube"></i></a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://twitter.com/"><i
                                                                    class="fa-brands fa-twitter"></i></a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://www.facebook.com/"><i
                                                                    class="fa-brands fa-facebook-f"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="bd-teacher-content-wrapper-2">
                                                <div class="bd-teacher-content-2 text-center">
                                                    <h4 class="bd-teacher-title-2 mb-5"><a
                                                            href="teacher-details.html">Emmy Jonas</a>
                                                    </h4>
                                                    <span class="bd-teacher-des is-white">Teacher</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bd-teacher-view-btn p-relative z-index-1 text-center mt-10">
                                    <a href="teacher.html">View Our All Teacher</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Tenaga Pendidik area end here  -->

        <!-- testimonial area start here  -->
        {{-- <section class="bd-testimonial-area-2 pb-120 pt-120"> --}}
        <section class="bd-testimonial-area-2 pb-120 p-relative pt-120 theme-bg">
            @include('testimoni')
        </section>
        <!-- testimonial area end here  -->


        <!-- Pengumuman area start here  -->
        <section class="bd-blog-area-2 p-relative fix pt-120 pb-120">
            @include('berita')
        </section>
        <!-- Pengumuman area end here  -->

        <!-- gallery area start here  -->
        {{-- <section class="bd-gallery-area p-relative pt-120 pb-60 .white-bg p-relative">
            @include('galeri')
        </section> --}}
        <!-- gallery area end here  -->
    </main>
    <!-- main area end here  -->
@endsection
