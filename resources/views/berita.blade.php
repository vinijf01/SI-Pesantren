<div class="container">
    <div class="bd-blog-section-title mb-40">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="bd-section-title-wrapper mb-0 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                    <h2 class="bd-section-title mb-0">Berita</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bd-blog-navigation mb-15 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                    <button class="bd-blog-prev">
                        <i></i><i class="fa-regular fa-angle-left"></i>
                    </button>
                    <button class="bd-blog-next">
                        <i class="fa-regular fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="bd-blog-active swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
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
                                            href="{{ route('detail-berita', $item->id) }}">{{ $item->judul }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
