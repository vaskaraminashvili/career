<x-layouts.master>
    <!-- blog area start  -->
    <section class="blog section-space section-space__inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="blog__details">
                        <div class="blog__details-thumb mb-20 text-center">
                            <img src="{{$news->img}}" class="img-fluid"
                                 alt="image not found">
                        </div>
                        <div class="blog__details-content">
                            <h4>{{$news->title}}</h4>

                            <div>
                                {!! $news->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 mx-auto">
                    <div class="row">
                        @foreach($news->images_urls as $image)
                            <div class="col-xl-3">
                                <div class="blog__details-thumb mb-20">
                                    <a data-fancybox="gallery" data-src="{{$image}}">
                                        <img src="{{$image}}" class="img-fluid"
                                             alt="image not found">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end  -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        <script>
            Fancybox.bind('[data-fancybox="gallery"]', {
                //
            });
        </script>
    @endpush
    @push('styles')
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
        />
    @endpush

</x-layouts.master>
