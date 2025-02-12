<div class="bd-testimonial-bottom-shape">
    <img src="{{ asset('assets/img/shape/wave-section-break.png') }}" alt="img not found!">
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bd-section-title-wrapper is-white z-index-1 p-relative text-center mb-55 wow fadeInUp"
                data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="bd-section-title mb-0">Testimoni</h2>
                {{-- <p>With the help of teachers and the environment as the third teacher, students<br> have
                    opportunities to confidently take risks.</p> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="bd-testimonial-active-2 swiper-container wow fadeInUp" data-wow-duration="1s"
                data-wow-delay=".5s">
                <div class="swiper-wrapper">
                    @foreach ($testimoni as $key => $item)
                        <div class="swiper-slide">
                            <div
                                class="bd-testimonial-2 mr-5 {{ $key % 2 == 0 ? 'theme-bg-6 mb-25' : 'clr-3 theme-bg-7' }}">
                                <div class="bd-testimonial-content-2 mb-35">
                                    <p>{{ $item->testimoni }}</p>
                                </div>
                                <div class="bd-testimonial-avatar d-flex align-items-center">
                                    <h6 class="bd-testimonial-avatar-title-2 mb-0">{{ $item->nama }}</h6>
                                    <div
                                        class="bd-testimonial-quote d-none d-sm-block {{ $key % 2 == 0 ? 'clr-2' : 'clr-1' }}">
                                        <i class="flaticon-quote"></i>
                                    </div>
                                </div>
                                <small>{{ $item->status }}</small>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- slider dots pagination -->
            <div class="bd-testimonial-pagination-2 bd-dots-pagination justify-content-center wow fadeInUp"
                data-wow-duration="1s" data-wow-delay=".3s"></div>
        </div>
    </div>
</div>
