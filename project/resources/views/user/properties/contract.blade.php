<!DOCTYPE html>
<html>
<head>
    <title>@lang('Contract')</title>

    <style>
        body {
            font-family: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        }
        .table {
            width: 100%;
            background: #f5f5f5;
        }

        .table tr th,
        .table tr td {
            padding: 10px 0;
            vertical-align: middle;
        }

        .table tr th {
            white-space: nowrap;
        }

        .table tr td:not(:last-child) span,
        .table tr th:not(:last-child) span {
            -webkit-border-end: 1px solid #000000;
            border-inline-end: 1px solid #000000;
        }

        .table tr td span,
        .table tr th span {
            font-size: 12px;
            display: block;
            padding: 0px 15px;
            text-align: center;
        }

        .table tr td span {
            font-size: 10px;
        }
    </style>

</head>
<body>
    <div class="">

        <div style="text-align:center">
            <img style="width: 180px;margin:0 auto" src="{{asset('/assets/images/'.$gs->logo)}}" alt="">
        </div>

        <div style="margin-bottom:34px;text-align:center">
            <h2 style="display:flex; align-items:center">
                <img style="width: 18px;margin-right:5px" src="{{asset('/assets/images/track/success.png')}}" alt="">
                <span>@lang('Property Contracts')</span>
            </h2>

            <h3 class="name my-3">@lang('Property of') {{ $data->user->name }}</h3>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>
                        <span>@lang('Transaction No')</span>
                    </th>
                    <th>
                        <span>@lang('Property Name')</span>
                    </th>
                    <th>
                        <span>@lang('User')</span>
                    </th>
                    <th>
                        <span>@lang('Amount')</span>
                    </th>
                    <th>
                        <span>@lang('Time')</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <span>{{$data->transaction_no}}</span>
                    </td>
                    <td>
                        <span>{{ $property['name'] }}</span>
                    </td>
                    <td>
                        <span>{{$data->user->name}}</span>
                    </td>
                    <td>
                        <span>{{ showSignAmount($data->amount) }}</span>
                    </td>
                    <td>
                        <span class="">
                            ৳ 40.000
                        </span>
                    </td>
                </tr>
            </tbody>

        </table>


        <div class="authorized-sign">
            <div style="text-align:right">
                    <div >
                        <!-- <img style="width: 180px;margin-left: auto" src="{{asset('/assets/images/track/sign.png')}}" alt=""></div> -->
                    <div>
                    <div style="width:200px;margin-top:80px;margin-left:auto;border-bottom:1px solid #000000">
                </div>
                </div>
                <div style="text-align:right;margin-top:5px">
                    {{ $data->user->name }}
                </div>
            </div>
        </div>



        <div style="text-align:center; margin-top:30px">
            <div style="font-weight: 400;font-size: 11px;line-height: 22px;color: #242A30;">
                <span style="margin-inline-end:5px;">
                    <a href="tel:01700000000" style="text-decoration: none; color: inherit;">@lang('Phone'): {{ $ps->phone }}</a>
                </span>
                <span>
                    <a href="mailto:admin@gmail.com" style="text-decoration: none; color: inherit;">@lang('Email'): {{ $ps->contact_email}}</a>
                </span>
            </div>
            <div style="font-weight: 400;font-size: 11px;line-height: 22px;color: #242A30;">{{ $ps->street}}</div>
            <span style="font-weight: 400;font-size: 10px;line-height: 22px;color: #242A30;">
                @php
                    echo $gs->copyright;
                @endphp
            </span>
        </div>

    </div>
</body>
</html>
