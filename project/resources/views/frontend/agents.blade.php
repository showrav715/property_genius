@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('All Agents')</h2>
                    <span class="ipn-subtitle">@lang('Lists of our all expert agents')</span>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->


    <!-- ============================ Agent List Start ================================== -->
    <section>
        <div class="container">
            <!-- row Start -->
            <form action="{{ route('front.agents') }}" method="get">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="text" class="form-control" name="agent" placeholder="@lang('Search agents')">
                                <i class="ti-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <button type="submit" class="btn search-btn">@lang('Find Agents')</button>
                    </div>
                </div>
            </form>
            <!-- /row -->

            <div class="row">
                @if (count($agents)>0)
                    @foreach ($agents as $key => $data)

                        <!-- Single Agent -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="agents-grid">

								<div class="jb-bookmark"><a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Bookmark"><i class="ti-bookmark"></i></a></div>
								<div class="agent-call"><a href="#"><i class="lni-phone-handset"></i></a></div>
								<div class="agents-grid-wrap">

									<div class="fr-grid-thumb">
										<a href="{{ route('front.agent.details',$data->username) }}">
											<div class="overall-rate">{{ App\Models\PropertyReview::agentRatingCount($data->id) }}</div>
											<img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid mx-auto" alt="" />
										</a>
									</div>
									<div class="fr-grid-deatil">
										<h5 class="fr-can-name"><a href="{{ route('front.agent.details',$data->username) }}">{{ $data->name }}</a></h5>
										<span class="fr-position"><i class="lni-map-marker"></i>{{ $data->address }}</span>

                                        @php
                                            $review = App\Models\PropertyReview::agentRatings($data->id);
                                        @endphp

                                        @if (isset($review) && $review>0)
                                            <div class="fr-can-rating">
                                                @for ($i = 1; $i <= $review; $i++)
                                                    <i class="ti-star filled"></i>
                                                @endfor

                                                @if (is_float($review))
                                                    <i class="ti-star"></i>
                                                @endif
                                            </div>
                                        @endif
									</div>

								</div>

								<div class="fr-grid-info">
									<ul>
										<li>@lang('Property')<span>{{ count($data->properties)}}</span></li>
										<li>@lang('Name')<span>{{ $data->name }}</span></li>
										<li>@lang('Phone')<span>{{ $data->phone }}</span></li>
									</ul>
								</div>

								<div class="fr-grid-footer">
									<a href="{{ route('front.agent.details',$data->username) }}" class="btn btn-outline-theme full-width">@lang('View Profile')<i class="ti-arrow-right ml-1"></i></a>
								</div>

							</div>
						</div>
                    @endforeach
                @else
                    <p>@lang('No Agent Found!')</p>
                @endif
            </div>
        </div>
    </section>
    <!-- ============================ Agent List End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
	<!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')

@endpush
