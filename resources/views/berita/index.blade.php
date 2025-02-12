@extends('layouts.main')
@section('content')
    <style>
        .pagination .page-item .page-link {
            height: 48px;
            width: 48px;
            line-height: 48px;
            text-align: center;
            color: var(--bd-common-black);
            background-color: var(--bd-grey-1);
            font-size: 16px;
            font-weight: 500;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            -webkit-transition: all 0.3s ease-out 0s;
            -moz-transition: all 0.3s ease-out 0s;
            -ms-transition: all 0.3s ease-out 0s;
            -o-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
            border: none;
            /* Menghilangkan border */
        }

        .pagination .page-item.active .page-link {
            color: var(--bd-common-white);
            background-color: var(--bd-theme-1);
        }

        .pagination .page-item.disabled .page-link {
            color: #aaa;
            background-color: #fff;
            border: 1px solid #ddd;
        }
    </style>

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
                                <h1 class="bd-breadcrumb-title">Berita</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('beranda') }}"><i class="flaticon-hut"></i>Beranda</a></span>
                                    <span>Berita Dan Informasi Pondok Pesantren Abdurrahman Bin Auf</span>
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
    <section class="bd-blog-sidebar-area pt-120 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bd-blog-sidebar-wrapper mb-60">
                        @foreach ($berita as $index => $item)
                            <div class="row">
                                <div class="col-12">
                                    <div class="bd-blog mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                        <a href="{{ route('detail-berita', $item->id) }}">
                                            <div class="bd-blog-thumb bd-blog-thumb-3">
                                                <img src="{{ url('assets/img/blog/' . $item->foto) }}" alt="blog image">
                                            </div>
                                        </a>
                                        <div class="bd-blog-meta bd-blog-meta-2">
                                            <span><i class="fas fa-user"></i> by <a
                                                    href="{{ route('detail-berita', $item->id) }}">{{ $item->penulis }}</a></span>
                                            <span><i class="fas fa-calendar-days"></i>
                                                {{ date('d M Y', $item->created_at->getTimestamp()) }}</span>
                                            <span><i class="fa-solid fa-comment-dots"></i><a href="#">0
                                                    Comments</a></span>
                                        </div>
                                        <div class="bd-blog-content-3">
                                            <h4 class="bd-blog-title-2 mt-5 mb-15"><a
                                                    href="{{ route('detail-berita', $item->id) }}">{{ $item->judul }}</a>
                                            </h4>

                                            @php

                                                $short_deskripsi = strip_tags($item->isi);
                                                $isi = mb_strcut($short_deskripsi, 0, 150);

                                            @endphp
                                            {{ $isi }}...

                                            <div class="bd-blog-read-btn mb-15 mt-30">
                                                <a href="{{ route('detail-berita', $item->id) }}" class="bd-btn">
                                                    <span class="bd-btn-inner">
                                                        <span class="bd-btn-normal">Selengkapnya</span>
                                                        <span class="bd-btn-hover">Selengkapnya</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-12">
                                <div class="bd-pagination pt-10 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                    <ul class="pagination">
                                        {{ $berita->links('pagination::bootstrap-4') }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="justify-content: right">
                    <div class="bd-blog-sidebar-wrapper mb-60">
                        <div class="bd-blog-sidebar mb-50 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                            <h5 class="bd-blog-sidebar-title">Pencarian</h5>
                            <div class="bd-blog-sidebar-content">
                                <div class="bd-blog-search">
                                    <form action="{{ route('search-berita') }}" method="GET">
                                        <div class="bd-blog-search-input-2">
                                            <input type="text" placeholder="ketik disini..." name="q"
                                                id="bd-blog-search-input-label">
                                            <div class="bd-blog-search-submit">
                                                <button type="submit"><i class="flaticon-search"></i></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="bd-blog-sidebar mb-50 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                            <h5 class="bd-blog-sidebar-title">Berita Terkini</h5>
                            <div class="bd-blog-latest">
                                <ul>
                                    @foreach ($beritaTerbaru as $baru)
                                        <li>
                                            <div class="bd-blog-latest-content">
                                                <div class="bd-blog-latest-thumb">
                                                    <a href="{{ route('detail-berita', $baru->id) }}">
                                                        <img src="{{ url('assets/img/blog/' . $baru->foto) }}"
                                                            alt="img not found!">
                                                    </a>
                                                </div>
                                                <div class="bd-blog-latest-title">
                                                    <h6><a
                                                            href="{{ route('detail-berita', $baru->id) }}">{{ $baru->judul }}</a>
                                                    </h6>
                                                    <div class="bd-blog-latest-meta">
                                                        <i
                                                            class="fa-solid fa-calendar-days"></i><span>{{ $baru->created_at->format('d M Y') }}</span>
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
        </div>
    </section>
@endsection
