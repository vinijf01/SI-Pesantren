<div class="container">
    <div class="row align-items-center">
        <div class="col-xl-6 col-lg-6">
            <div class="bd-faq-content-2 mb-60 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="bd-section-title-wrapper mb-25">
                    <h2 class="bd-section-title mb-0">Pertanyaan Yang
                        <br>Sering Ditanyakan
                    </h2>
                </div>
                <div class="bd-faq">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faq->take(5) as $index => $item)
                            @php
                                $headingId = 'heading' . ($index + 1);
                                $collapseId = 'collapse' . ($index + 1);
                                $collapsedClass = $index > 0 ? 'collapsed' : '';
                            @endphp

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button class="accordion-button {{ $collapsedClass }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                        aria-expanded="true" aria-controls="{{ $collapseId }}">
                                        {{ $item->pertanyaan }}
                                    </button>
                                </h2>
                                <div id="{{ $collapseId }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="{{ $headingId }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{ $item->jawaban }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="bd-faq-thumb-wrapper mb-70">
                <div class="bd-faq-thumb">
                    <div class="bd-faq-thumb-mask p-relative wow fadeInRight" data-wow-duration="1s"
                        data-wow-delay=".3s">
                        <img src="{{ asset('assets/img/faq/1.jpg') }}" alt="Image not found">
                        <div class="panel-2 wow"></div>
                    </div>
                </div>
                <div class="bd-faq-shape d-none d-lg-block">
                    <img src="{{ asset('assets/img/shape/tripple-line.png') }}" alt="Shape not found">
                </div>
            </div>
        </div>
    </div>
</div>
