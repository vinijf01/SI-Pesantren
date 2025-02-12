   <!-- hero area bg here  -->
   <div class="bd-gradient-bg"></div>

   <!-- hero area side social  -->
   <div class="bd-hero-social-wrapper">
       <div class="bd-hero-social">
           <a href="{{ $heroData->link_fb ?? '#' }}"><i class="fa-brands fa-facebook-f"></i> Facebook
           </a>
       </div>
       <div class="bd-hero-social">
           <a href="{{ $heroData->link_ig ?? '#' }}"><i class="fa-brands fa-instgram"></i>instagram</a>
       </div>
       <div class="bd-hero-social">
           <a href="{{ $heroData->link_yt ?? '#' }}"><i class="fa-brands fa-youtube"></i>youtube</a>
       </div>
   </div>
   <div class="container">
       <div class="bd-hero-inner-3">
           <div class="bd-hero-shape-wrapper d-none d-lg-block">
               <div class="bd-hero-3-shape-2">
                   <img src="{{ asset('assets/img/shape/curved-line-2.png') }}" alt="Shape not found">
               </div>
           </div>
           <div class="row align-items-center">
               <div class="col-lg-7 col-md-6">
                   <div class="bd-hero-content">
                       <span class="wow fadeInUp" data-wow-duration="1s"
                           data-wow-delay=".3s">{{ $heroData->judul ?? 'Selamat Datang Di' }}</span>
                       <h1 class="bd-hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                           {{ $heroData->isi ?? 'Pesantren Abdurrahman Bin Auf' }}
                       </h1>
                       <div class="bd-hero-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                           <a href="{{ $heroData->link_btn ?? '#about' }}" class="bd-btn">
                               <span class="bd-btn-inner">
                                   <span
                                       class="bd-btn-normal">{{ $heroData->keterangan_tombol ?? 'Selengkapnya' }}</span>
                                   <span
                                       class="bd-btn-hover">{{ $heroData->keterangan_tombol ?? 'Selengkapnya' }}</span>
                               </span>
                           </a>
                       </div>
                   </div>
               </div>
               <div class="col-lg-5 col-md-6">
                   <div id="scene">
                       <div class="bd-hero-thumb-3-wrapper p-relative z-index-1" data-depth=".4">
                           <div class="bd-hero-thumb-3 p-relative">
                               <div class="bd-hero-thumb-3-mask">
                                   <img src="{{ url('assets/img/hero/' . ($heroData->image ?? 'default-hero.jpg')) }}"
                                       alt="img not found!">
                               </div>
                           </div>
                           <div class="bd-hero-thumb-3-shape d-none d-md-block">
                               <div class="bd-hero-thumb-3-shape-1 p-absolute">
                                   <img src="assets/img/shape/home-3-shape-1.png" alt="img not found!">
                               </div>
                               <div class="bd-hero-thumb-3-shape-2 p-absolute">
                                   <img src="assets/img/shape/home-3-shape-2.png" alt="img not found!">
                               </div>
                               <div class="bd-hero-thumb-3-shape-3 p-absolute">
                                   <img src="assets/img/shape/home-3-shape-3.png" alt="img not found!">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="bd-hero-3-shape d-none d-lg-block" id="scene2">
       <img data-depth=".5" src="{{ asset('assets/img/shape/hero-3-shape-4.png') }}" alt="img not found!">
   </div>
