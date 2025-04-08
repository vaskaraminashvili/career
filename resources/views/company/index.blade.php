<x-layouts.master>
    <div class="doctor-page section-space section-space__inner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title-wrapper mb-60 mb-xs-40">
                        <h2 class="section__title mb-0 title-animation">{{__('კომპანიები')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-minus-30">
                @foreach($companies as $company)
                    <div class="col-xl-4 col-md-6">
                        <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                            <div class="team__item-media">
                                <a href="{{route('vacancies.companyVacancies', ['company_id' => $company->id])}}">
                                    <img class="img-fluid" src="{{$company->img}}" alt="image not found">
                                </a>
                            </div>

                            <div class="team__item-content">
                                <div class="team__item-content-left">
                                    <div class="title-box">
                                        <a href="{{route('vacancies.companyVacancies', ['company_id' => $company->id])}}">
                                            {{ Str::limit($company->title, 69, '...') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-3">
                <div class="col-xl-12">
                    {{ $companies->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>
