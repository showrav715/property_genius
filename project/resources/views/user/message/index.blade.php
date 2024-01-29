@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Support Ticket')</h2>
                    <span class="ipn-subtitle">@lang('Dashboard')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="card default--card h-100">
            <div class="card-body">
                <div class="chatbox__list__wrapper">
                    <div class="d-flex align-items-center flex-wrap justify-content-between py-4 border-bottom border--dark">
                        <h3><a href="javascript:void(0)">@lang('Tickets')<i class="fas fa-arrow-right "></i></a>
                        </h3>
                        <button class="btn btn-primary text-white border-0" data-bs-toggle="modal" data-bs-target="#ticket-modal"><i class="fas fa-plus me-2"></i> @lang('Open a ticket')</button>
                    </div>


                    <ul class="chat__list nav-tab nav border-0">
                        @foreach ($tickets as $key => $data)
                            <li>
                                <a class="chat__item {{ request()->query('ticket') == $data->id ? 'active' : '' }}" href="{{ route('user.message.index',['ticket'=>$data->id]) }}">
                                    <div class="item__inner">
                                        <div class="post__creator">
                                            <div class="post__creator-thumb d-flex justify-content-between">
                                                <span class="username">{{ $data->ticket_number }} </span>
                                            </div>
                                            <div class="post__creator-content">
                                                <h4 class="name d-inline-block">{{ $data->subject }}</h4>
                                            </div>
                                        </div>
                                        <ul class="chat__meta d-flex justify-content-between">
                                            <li><span class="last-msg"></span></li>
                                            <li><span class="last-chat-time">{{ $data->created_at->format('d M Y') }}</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card default--card h-100">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show fade active" id="c1">
                        <div class="chat__msg">
                            @if (count($messages)>0)
                                <div class="chat__msg-header py-2">
                                    <div class="post__creator align-items-center">

                                        <div class="post__creator-content">
                                            <h4 class="name d-inline-block">@lang('Ticket Number') : {{ $ticket->ticket_number }}
                                            </h4>
                                        </div>
                                        <a class="profile-link" href="javascript:void(0)"></a>
                                    </div>
                                </div>

                                <div class="chat__msg-body">
                                    <ul class="msg__wrapper mt-3">
                                        @foreach($messages as $key => $data)
                                            @if($data->user_id == 0)
                                                <li class="incoming__msg">
                                                    <div class="msg__item">
                                                        <div class="post__creator">
                                                            <div class="post__creator-content">
                                                                <p>{{ $data->message }}</p>
                                                                <span class="comment-date text--secondary">{{ $data->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                <li class="outgoing__msg">
                                                    <div class="msg__item">
                                                        <div class="post__creator ">
                                                            <div class="post__creator-content">
                                                                <p class="out__msg">{{ $data->message }}
                                                                    <br>
                                                                    @if ($data->photo != NULL)
                                                                        <a href="{{ asset('assets/images/'.$data->photo)}}" download="" class="text-white"><i class="fas fa-paperclip"></i> @lang('attachment')-{{ $key +=1 }}</a>
                                                                    @endif
                                                                </p>
                                                                <span class="comment-date text--secondary">{{ $data->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="chat__msg-footer">
                                    <form action="{{ route('user.message.conversation',$ticket->id) }}" class="send__msg" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group">
                                            <input id="upload-file" type="file" name="photo" class="form-control d-none">
                                            <label class="-formlabel upload-file" for="upload-file"><i class="fas fa-cloud-upload-alt"></i>
                                            </label>
                                        </div>
                                        <div class="input-group">
                                            <textarea class="form-control form--control shadow-none" name="message"></textarea>
                                            <button class="border-0 outline-0 send-btn" type="submit"><i class="fab fa-telegram-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="chat__msg-body">
                                    <h3 class="text-center my-4">@lang('No Message Found')</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ticket-modal" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('user.message.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body p-4">
                <h4 class="modal-title text-center" id="withdrawModalTitle">@lang('Create a ticket')</h4>
                <div class="pt-3 pb-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label required">{{__('Subject')}}</label>
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" autocomplete="off" placeholder="{{__('Enter Subject')}}" value="{{ old('subject') }}">
                                @error('subject')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">{{__('Message')}}</label>
                                <textarea name="message" class="form-control nic-edit @error('message') is-invalid @enderror" cols="30" rows="5" placeholder="{{__('Enter Message')}}"></textarea>
                                @error('message')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="file" name="attachment" class="form-control @error('attachment') is-invalid @enderror">
                                @error('attachment')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-flex">
                    <button type="button" class="btn shadow-none btn-danger me-2 w-50" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn shadow-none btn-success w-50">@lang('Send')</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
@endsection

@push('js')
<script type="text/javascript">
    'use strict';

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

</script>

@endpush
