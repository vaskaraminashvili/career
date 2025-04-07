<x-layouts.master>
    <section class="service-details section-space section-space__inner">
        <div class="container">
            <div class="row flex-xl-row flex-column-reverse">
                <div class="col-xl-4">
                    <div class="sidebar sidebar-rr-sticky">

                        <div class="sidebar__widget-contact__service text-center">
                            <h4 class="mb-25 title-animation text-capitalize">{{$vacancy->company->title}}</h4>
                            <img class="mb-25" src="{{$vacancy->company->img}}" alt="">

                            <a href="{{route('vacancies.companyVacancies', ['company_id' => $vacancy->company->id])}}"
                               class="rr-btn rr-btn__transparent">
                                <span class="btn-wrap">
                                    <span class="text-one">{{__('ყველა ვაკანსიების ნახვა')}}</span>
                                    <span class="text-two">{{__('ყველა ვაკანსიების ნახვა')}}</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="service-details__content">

                        <h2 class="title-animation mb-20">{{$vacancy->title}}</h2>

                        {!! $vacancy->description !!}
                        <div class="mt-4">
                            <a href="appoinment.html" class="rr-btn">
                                <span class="btn-wrap">
                                    <span class="text-one">{{__('მიმართეთ ახლავე')}}</span>
                                    <span class="text-two">{{__('მიმართეთ ახლავე')}}</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.master>
