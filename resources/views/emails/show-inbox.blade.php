@extends('layouts.app')
@section('content')
<span class="d-none" id="appId">{{ $apartment->slug }}</span>
<section id="show-inbox">
    <div class="container py-5">
        <h4 class="pb-4">I tuoi messaggi per: {{ $apartment->title }} </h4>
        <h5>Hai <span id="countUnread" class="text-danger fs-1">{{count($apartment->leads)}}</span> messaggi non letti !</h5>
        <div class="msg-list">
            @foreach ($apartment->leads as $lead)
                <div id="{{ $lead->id }}" class="my_col @if($lead->read == 0) not-read @endif">
                    @if($lead->read == 0)
                        <h6 class="text-success text-uppercase">nuovo</h6>
                    @endif
                    <div class="top_messages">
                        <p class="name_message">
                            <span class="emerald"><strong>Mittente:</strong>
                            </span> {{ $lead->name }}</p>

                        <p class="mail_message"><span  class="emerald"><strong>Mail mittente:</strong></span> {{ $lead->email }}</p>

                        <small>
                            <form action="{{ route('admin.updateInbox') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" id="inboxId" name="inboxId" value="{{ $lead->id }}">
                                <button class="checkReadBtn text-secondary" type="submit"><i class="fa-solid fa-envelope emerald pe-2"></i> Clicca qui per vedere il corpo della mail</button>
                            </form>
                        </small>
                    </div>
                    @if($lead->read == 1)
                        <div class="bottom_messages">
                            <div class="pt-3"><span class="emerald"><strong>Messaggio:</strong></span>
                                {{ $lead->message }}
                            </div>
                        </div>
                    @endif
                </div>
            <hr />
            @endforeach
        </div>
    </div>
@endsection
