@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Our Articles')</h2>
                    <span class="ipn-subtitle">@lang('See Our Latest Articles & News')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section>
        <div class="container">
            @if (count($blogs) > 0)
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading center">
                            <h2>@lang('Latest News')</h2>
                            <p>@lang("We post regulary most powerful articles for help and support.")</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
				@if (count($blogs) == 0)
					<div class="col-12 text-center">
						<h3 class="m-0">{{__('No Blog Found')}}</h3>
					</div>
				@else
                    @foreach ($blogs as $key=>$data)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-wrap-grid">
                                <div class="blog-thumb">
                                    <a href="{{ route('blog.details',$data->slug) }}"><img src="{{asset('assets/images/'.$data->photo)}}" class="img-fluid" alt="" /></a>
                                </div>

                                <div class="blog-info">
                                    <span class="post-date"><i class="ti-calendar"></i>{{ $data->created_at->format(' d M Y') }}</span>
                                </div>

                                <div class="blog-body">
                                    <h4 class="bl-title"><a href="{{ route('blog.details',$data->slug) }}">{{ Str::limit($data->title,30) }}</a></h4>
                                    <p>{{ Str::limit(strip_tags($data->details,100)) }}</p>
                                    <a href="{{ route('blog.details',$data->slug) }}" class="bl-continue">@lang('Continue')</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
				@endif
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @if($blogs->hasPages())
                        {{ $blogs->links() }}
                    @endif
                </div>
            </div>

        </div>

    </section>
    <!-- ============================ Agency List End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->



@endsection

@push('js')

@endpush
