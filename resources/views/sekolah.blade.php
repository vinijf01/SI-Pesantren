@extends('layouts.main')
@section('content')
    <!-- main area start here  -->
    <main>
        <section class="bd-routine-2-area pt-120">
            <div class="container">
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="bd-section-title-wrapper text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                                data-wow-delay=".3s">
                                <h2 class="bd-section-title mb-0">{{ $kata_pengantar->keterangan }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="bd-routine-2-area ">
            <div class="container">
                <div class="bd-routine-2-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                    <div class="row">
                        <div class="col-lg-3 mb-50" style="height: 70%">
                            <div class="bd-teacher-widget wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="bd-teacher-widget-thumb p-relative">
                                    <img src="{{ url('assets/img/teacher/' . $kata_pengantar->foto) }}"
                                        alt="img not found!">
                                    <div class="panel wow"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8" style="text-align: justify">
                            <p>{!! $kata_pengantar->kata_pengantar !!}</p>
                        </div>
                    </div>
        </section>
        <!-- routine area end here  -->
    </main>
    <!-- main area end here  -->
@endsection
