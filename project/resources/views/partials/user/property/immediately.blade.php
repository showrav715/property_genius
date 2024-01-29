@if ($data->phase == 0)
    <div class="alert alert-success text-center" role="alert">
        @lang('Payment Successfully Completed.')
    </div>
@endif

@if ($data->phase == 2)
    <div class="alert alert-warning text-center" role="alert">
        @lang('Your submittion is waitting for agent verification')
    </div>
@endif

@if ($data->phase == 3)
    <div class="alert alert-warning text-center" role="alert">
        @lang('Please Download the contracts and sign here to upload for next phase')
    </div>
@endif

@if ($data->phase == 4)
    <div class="alert alert-warning text-center" role="alert">
        @lang('Sign document submitted, wait for agent approval')
    </div>
@endif

@if ($data->phase == 5)
    <div class="alert alert-warning text-center" role="alert">
        @lang('Agent approve your submitted document, please pay now.')
    </div>
@endif
