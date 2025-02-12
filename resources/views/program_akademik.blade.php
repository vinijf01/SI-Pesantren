<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bd-section-title-wrapper text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                data-wow-delay=".2s">
                <h2 class="bd-section-title mb-0">Program Akademik</h2>
                <p>Program kami menggabungkan pendidikan agama dan umum dengan fokus pada pengembangan karakter dan
                    kompetensi siswa.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="bd-class-active-2 swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                <div class="swiper-wrapper">
                    @foreach ($program_akademik as $key => $item)
                        <div class="swiper-slide">

                            <div class="bd-class-wrapper-2 text-center">
                                <div class="{{ $key % 2 == 0 ? 'bd-class-2 clr-2' : 'bd-class-2' }}">
                                    <div class="bd-class-icon-wrapper">
                                        <div class="bd-class-icon-2">
                                            <i class="flaticon-exclusive"></i>
                                        </div>
                                    </div>

                                    <div class="bd-class-content">
                                        <style>
                                            .bd-class-title-pa a:hover {
                                                color: var('#00BBAE');
                                            }
                                        </style>
                                        <h3 class=  "{{ $key % 2 == 0 ? 'bd-class-title-pa' : 'bd-class-title' }}"><a
                                                href="{{ route('program-akademik', $item->id) }}">{{ $item->nama_program }}</a>
                                        </h3>
                                        <p>{{ $item->deskripsi_singkat }}</p>
                                        <div class="bd-class-btn">
                                            <a href="{{ route('program-akademik', $item->id) }}"
                                                class="{{ $key % 2 == 0 ? 'bd-btn' : 'bd-btn bd-btn-grey' }}">
                                                <span class="bd-btn-inner">
                                                    <span class="bd-btn-normal">View Details</span>
                                                    <span class="bd-btn-hover">View Details</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- slider dots pagination -->
            <div class="bd-class-pagination bd-dots-pagination"></div>
        </div>
    </div>
</div>
