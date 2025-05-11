<div class="container">
    <div class="row align-items-center">
        <div class="col-xl-6 col-lg-6">
            <div class="bd-promotion-thumb-wrapper mb-60">
                <div class="bd-promotion-thumb">
                    <div class="bd-promotion-thumb-mask p-relative wow fadeInLeft" data-wow-delay=".3s"
                        data-wow-duration="1">
                        <img src="{{ asset('assets/img/promotion/' . ($tentang_pesantren->foto ?? 'default.png')) }}"
                            alt="Image not found">
                        <div class="panel wow"></div>
                    </div>
                </div>
                <div class="bd-promotion-shape d-none d-lg-block">
                    <img src="{{ asset('assets/img/shape/tripple-line.png') }}" alt="Shape not found">
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="bd-promotion mb-60 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="bd-section-title-wrapper mb-35">
                    <h2 class="bd-section-title mb-10">
                        {{ $tentang_pesantren->judul ?? 'Pesantren Abdurrahman Bin Auf' }}</h2>
                    <p> {{ $tentang_pesantren->deskripsi ?? 'Lembaga pendidikan Islam yang berkomitmen untuk mencetak generasi qurani, cerdas, dan berakhlak mulia. Kami memiliki program pendidikan yang komprehensif, meliputi pendidikan agama, bahasa Arab, dan ilmu pengetahuan umum.' }}
                    </p>
                </div>
                <div class="bd-promotion-counter-wrapper mb-40">
                    @foreach ($data_kuantitatif as $item)
                        <div class="bd-promotion-counter">
                            <div class="bd-promotion-counter-number">
                                <p><span class="counter">{{ $item->jumlah }}</span></p>
                            </div>
                            <div class="bd-promotion-counter-text">
                                <span>{{ $item->keterangan }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bd-promotion-list mb-50">
                    <ul>
                        <li>Mencetak generasi rabbani.</li>
                        <li>Berakhlak Qur'ani dan Cinta NKRI.</li>
                    </ul>
                </div>
                <div class="bd-promotion-btn-wrapper flex-wrap">
                    <div class="bd-promotion-btn">
                        <a href="{{ route('ppdb') }}" class="bd-btn">
                            <span class="bd-btn-inner">
                                <span class="bd-btn-normal">Daftar Sekarang</span>
                                <span class="bd-btn-hover">Daftar Sekarang</span>
                            </span>
                        </a>
                    </div>
                    <div class="bd-promotion-btn-2 bd-pulse-btn btn-2">
                        <a href="{{ $tentang_pesantren->link_video ?? '' }}" class="popup-video"><i
                                class="flaticon-play-button"></i>
                            {{ $tentang_pesantren->keterangan_video ?? 'Video Description' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
