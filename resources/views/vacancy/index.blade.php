<x-layouts.master>
    <!-- services 4 start -->
    <section
        class="service-4 section-space  section-space__inner {{Route::is('vacancies.companyVacancies') ? 'bg-white' : ''}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title-wrapper mb-60 mb-xs-40">
                        <h2 class="section__title mb-0 title-animation">
                            @if($vacancies->count() != 0 && Route::is('vacancies.companyVacancies'))
                                {{$vacancies[0]->company->title}}
                            @endif
                            {{__('ვაკანსიები')}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row mb-minus-30">
                @forelse($vacancies as $vacancy)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="service-4__item mb-30">
                            <div class="mb-40 mb-xs-20 image-box">
                                <a href="{{route('vacancies.show', ['id' => $vacancy->id])}}">
                                    <img class="" src="{{$vacancy->company->img}}" alt="icon not found">
                                </a>
                            </div>
                            <div class="service-4__item-text">
                                <div class="title-box mb-25 mb-xs-20">
                                    <a href="{{route('vacancies.show', ['id' => $vacancy->id])}}"> {{ Str::limit($vacancy->title, 55, '...') }} </a>
                                </div>

                                <a class="rr-a-btn" href="{{route('vacancies.show', ['id' => $vacancy->id])}}">
                                    {{__('სრულად ნახვა')}}
                                    <i class="fa-solid fa-circle-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-xl-12">
                        <p class="display-1">
                            {{__('ვაკანსიები ვერ მოიძებნა')}}
                        </p>
                    </div>
                @endforelse
            </div>
            <div class="row mt-3">
                <div class="col-xl-12">
                    {{ $vacancies->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
    <!-- services 4 end -->
</x-layouts.master>
