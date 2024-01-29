@extends('layouts.front')

@push('css')

@endpush

@section('content')
   <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">{{ $property->name }}</h2>
                    <span class="ipn-subtitle">@lang('Price') {{ showNameAmount($property->price) }}</span>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Submit Property Start ================================== -->
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <!-- Submit Form -->
                <div class="col-lg-9 col-md-12">
                    <div class="submit-page">
                        <form action="{{ route('user.property.buy.rent.submit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-submit">
                                <div class="submit-section">
                                    <div class="row gy-3">
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        @forelse ($requirementForms as $key=>$field)
                                            @if ($field->type == 1 || $field->type == 3 )
                                                <div class="form-group col-md-12">
                                                    <label>@lang($field->label)</label>
                                                        @if($field->type == 1)
                                                        <input class="form-control" name="{{ $field->name }}" type="text" placeholder="{{strtolower($field->label)}}">
                                                    @else
                                                        <textarea class="form-control" name="{{ $field->name }}"></textarea>
                                                    @endif
                                                </div>
                                            @elseif($field->type == 2)
                                                <div class="form-group">
                                                    @if ($field->type == 2 )
                                                        <label class="font-weight-bold">@lang($field->label)</label>
                                                        <input class="form-control" name="{{ $field->name }}" type="file">
                                                    @endif
                                                </div>
                                            @endif
                                        @empty
                                            <div class="form-group text-center">
                                            </div>
                                        @endforelse


                                        <div id="manageVisit" class="d-none">
                                            <div class="form-group col-md-12">
                                                <label class="font-weight-bold">@lang('Select a date')</label>
                                                <input class="date form-control" name="visit_date" type="text" placeholder="@lang('please select a date')">
                                            </div>


                                            <div class="p-4">
                                                <div class="row">
                                                    @if (isset($schedule->times))
                                                        @foreach (explode(",",$schedule->times) as $key => $data)
                                                            <div class="col-md-1">
                                                                <span class="btn btn-sm btn-info time_slot">{{ $data }}</span>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        @if ($property->type == 'for_rent')
                                            <div class="form-group col-md-12">
                                                <label>@lang('Rent Type')</label>
                                                <select id="rentType" name="rent_type" class="form-control">
                                                    <option value="immediately">@lang('immediately')</option>
                                                    <option value="visit">@lang('visit')</option>
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="scheduleTime" name="schedule_time" value="">

                            <div class="form-group col-lg-12 col-md-12 my-2">
                                <button class="btn btn-theme full-width" type="submit">@lang('Submit')</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="checkout-side">

                        <div class="booking-short">
                            <img src="{{ asset('assets/images/'.$property->photo) }}" class="img-fluid" alt="" />
                            <h4>{{ $property->name}}</h4>
                            <span>{{ $property->real_address}}</span>
                        </div>

                        <div class="booking-short-side">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="bookinDet">
                                    </div>

                                    <div id="bookinSer" class="collapse show" aria-labelledby="bookinDet" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="booking-detail-list">
                                                <li>@lang('Beds')<span>{{ $property->bed }}</span></li>
                                                <li>@lang('Bath')<span>{{ $property->bathroom }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Submit Property End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    </section>
    <!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')
<script>
    'use strict';

    $('.date').datepicker({
        format: 'yyyy-dd-mm',
        todayHighlight: true,
    });

    $(".time_slot").on('click',function(){
        let time = $(this).text();

        $(".time_slot").each(function(){
            $(this).prop("class","btn btn-sm btn-info time_slot");
        })

        if(time != " "){
            $(this).prop("class","btn btn-sm btn-warning time_slot");
            $("#scheduleTime").val(time);
        }
    })


    $("#rentType").on('change',function(){
        let rent_type = $(this).val();
        if(rent_type == 'visit'){
            $("#manageVisit").removeClass('d-none');
        }else{
            $("#manageVisit").addClass('d-none');
        }
    })
</script>
@endpush
