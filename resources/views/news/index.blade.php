<x-layouts.master>
    <!-- blog area start -->
    <section class="blog section-space section-space__inner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title-wrapper mb-60 mb-xs-40">
                        <h2 class="section__title mb-0 title-animation">
                            @if(Route::is('vacancies.companyVacancies'))
                                {{$vacancies[0]->company->title}}
                            @endif
                            {{__('სიახლეები')}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row mb-minus-30">
                @foreach($news as $item)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog__item mb-30">
                            <a href="{{route('news.show', ['id' => $item->id])}}"
                               class="blog__item-media d-block position-relative overflow-hidden">
                                <div class="panel wow"></div>
                                <img class="img-fluid" src="{{$item->img}}" alt="image not found">
                            </a>

                            <div class="blog__item-content">
                                <div class="blog__item-content-date mb-15 mb-xs-10"><i
                                        class="fa-solid fa-calendar-days"></i>
                                    <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                </div>
                                <div class="title-box title-box__news mb-15 mb-xs-10">
                                    <a href="{{route('news.show', ['id' => $item->id])}}">
                                        {{ Str::limit($item->title, 80, '...') }}
                                    </a>
                                </div>

                                <a class="rr-a-btn" href="{{route('news.show', ['id' => $item->id])}}">
                                    {{__('მეტის ნახვა')}}
                                    <i class="fa-solid fa-circle-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- blog area end -->
</x-layouts.master>
