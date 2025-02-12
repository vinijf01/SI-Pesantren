<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bd-section-title-wrapper mb-55 text-center wow fadeInUp" data-wow-duration="1s"
                data-wow-delay=".3s">
                <h2 class="bd-section-title mb-0">Galeri Kami</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="bd-gallery-active swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                <div class="swiper-wrapper">
                    @foreach ($galeri as $item)
                        <div class="swiper-slide">
                            <div class="bd-gallery">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ url('assets/img/gallery/' . $item->foto) }}" alt="img not found!">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ url('assets/img/gallery/' . $item->foto) }}" class="popup-image"><i
                                                class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- program slider dots pagination  -->
            <div class="bd-gallery-pagination bd-dots-pagination fill-pagination wow fadeInUp" data-wow-duration="1s"
                data-wow-delay=".4s"></div>
        </div>
    </div>
</div>
