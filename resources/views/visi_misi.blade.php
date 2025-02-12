@extends('layouts.main')
@section('content')
    <!-- main area start here  -->
    <main>
        <!-- routine area start here  -->
        <section class="bd-routine-2-area pt-120 pb-120">
            <div class="container">
                <div class="bd-routine-2-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                    <div class="row">
                        <div class="col-12">
                            <h2>Visi</h2>
                            <p>{!! $visi_misi->visi !!}</p>
                            <h2>Misi</h2>
                            <p class="table table-striped">{!! $visi_misi->misi !!}</p>
                        </div>
                        <div class="bd-blog-details-quote wow  fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <blockquote class="bd-blog-quote">
                                <div class="bd-blog-quote-icon">
                                    <i class="flaticon-quote"></i>
                                </div>
                                <div class="bd-blog-quote-content">
                                    <p>{{ $visi_misi->motto }}</p>
                                    <span>Motto</span>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- routine area end here  -->
    </main>
    <!-- main area end here  -->
@endsection
