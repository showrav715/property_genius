@if ($data->phase == 3)
<div class="alert alert-warning text-center" role="alert">
    @lang('Please Wait for client sign document submission')
</div>
@endif

@if ($data->phase == 4)
<div class="alert alert-warning text-center" role="alert">
    @lang('Client submit document, please go for next phase')
</div>
@endif

@if ($data->phase == 5)
<div class="alert alert-warning text-center" role="alert">
    @lang('Please Wait for client payment')
</div>
@endif
