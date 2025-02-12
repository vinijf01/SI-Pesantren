<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bd-section-title-wrapper text-center mb-35 wow fadeInUp" data-wow-duration="1s"
                data-wow-delay=".2s">
                <h2 class="bd-section-title mb-0">Ektrakulikuler</h2>
                <p> Kegiatan mengembangkan potensi dan bakat santri di luar kegiatan akademis. Kegiatan ini membantu
                    meningkatkan keterampilan sosial, kepemimpinan, kerja tim, dan karakter peserta didik.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="bd-program-active swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                <div class="swiper-wrapper pt-20">
                    @foreach ($ekstrakulikuler as $item)
                        <div class="swiper-slide">
                            <div class="bd-program-2 ">
                                <div class="bd-program-2 clr-{{ ($loop->iteration % 3) + 1 }}">
                                    <div class="bd-program-thumb-wrapper">
                                        <a href="{{ route(404) }}">
                                            <div class="bd-program-thumb-2">
                                                <img src="{{ url('assets/img/ekstrakulikuler/' . $item->image) }}"
                                                    alt="Image not found">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="bd-program-content mb-10">
                                        <h3 class="bd-program-title"><a class="hover-clr-1"
                                                href="{{ route('404') }}">{{ $item->nama_ekstrakulikuler }}</a>
                                        </h3>
                                    </div>
                                    <div class="bd-program-info-wrapper-2">
                                        <div class="bd-program-info">
                                            <h5 class="bd-program-info-title">{{ $item->waktu_per_minggu }} Kali /
                                                <br><span>Minggu</span>
                                            </h5>
                                        </div>
                                        <div class="bd-program-info">
                                            <h5 class="bd-program-info-title">
                                                {{ $item->jam_per_periode }} /<br><span>periode</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- program slider dots pagination  -->
    <div class="bd-program-pagination bd-dots-pagination fill-pagination"></div>
</div>
