@if ($data->status == 0)
    <div class="alert alert-warning text-center" role="alert">
        @lang('You have an appointment. Property visit time is : '){{ Carbon\Carbon::parse($data->visit_date)->format('d M y ') }} {{ $data->schedule_time }}
    </div>
@endif

@if ($data->status == 1)
    <div class="alert alert-success text-center" role="alert">
        @lang('You approved for an appoinment. Property visit time is : '){{ Carbon\Carbon::parse($data->visit_date)->format('d M y ') }} {{ $data->schedule_time }}
    </div>
@endif
