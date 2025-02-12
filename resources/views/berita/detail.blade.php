@extends('layouts.main')
@section('content')
    <!-- blog details area start here  -->
    <section class="bd-blog-details-area pt-120 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bd-blog-details-wrapper mb-60">
                        <div class="row">
                            <div class="col-12">
                                <div class="bd-blog-details mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                    <div class="bd-blog-details-thumb">
                                        <img src="{{ url('assets/img/blog/' . $berita_detail->foto) }}" alt="blog image">
                                    </div>
                                    <div class="bd-blog-details-meta wow fadeInUp" data-wow-duration="1s"
                                        data-wow-delay=".3s">
                                        <span><i class="fas fa-user"></i> by {{ $berita_detail->penulis }}</span>
                                        <span><i class="fas fa-calendar-days"></i>
                                            {{ $berita_detail->created_at }}</span>
                                    </div>
                                    <div class="bd-blog-details-content wow fadeInUp" data-wow-duration="1s"
                                        data-wow-delay=".3s">
                                        <h3 class="bd-blog-details-title mt-5 mb-15">{{ $berita_detail->judul }}t
                                        </h3>
                                        <p>
                                            {!! $berita_detail->isi !!}
                                        </p>
                                    </div>
                                    <div class="bd-blog-share d-flex justify-content-between align-items-center flex-wrap wow fadeInUp"
                                        data-wow-duration="1s" data-wow-delay=".3s">
                                        <div class="bd-blog-tag">
                                            <ul>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                        <div class="bd-blog-social">
                                            <ul>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog details area end here  -->

    <!-- blog area start here  -->
    <section class="bd-blog-area pb-120">
        <div class="container">
            <div class="bd-blog-section-title mb-40">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="bd-section-title-wrapper text-center mb-0 wow fadeInUp" data-wow-duration="1s"
                            data-wow-delay=".2s">
                            <h2 class="bd-section-title mb-0">Berita Lainnya</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bd-blog-active swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="swiper-wrapper">
                            @foreach ($berita as $item)
                                <div class="swiper-slide">
                                    <div class="bd-blog">
                                        <a href="{{ route('detail-berita', $item->id) }}">
                                            <div class="bd-blog-thumb">
                                                <img src="{{ url('assets/img/blog/' . $item->foto) }}" alt="berita image">
                                            </div>
                                        </a>
                                        <div class="bd-blog-content bd-blog-content-2">
                                            <div class="test-thumb">
                                                <div class="bd-blog-date-2">
                                                    {{-- <span>{{ date('d M Y', $item->created_at) }}</span> --}}
                                                    <span>{{ date('d M Y', $item->created_at->getTimestamp()) }}</span>

                                                </div>
                                            </div>
                                            <div class="bd-blog-meta">
                                                <span><i class="fas fa-user"></i> by <a
                                                        href="{{ route('detail-berita', $item->id) }}">{{ $item->penulis }}</a></span>
                                            </div>
                                            <h4 class="bd-blog-title"><a
                                                    href="{{ route('detail-berita', $item->id) }}">{{ $item->judul }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- slider dots pagination -->
                    <div class="bd-blog-pagination bd-dots-pagination wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".3s"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end here  -->
@endsection
