@extends('layouts.dashbord.app')

@section('content')

    <div class="box w-75 m-auto table-responsive card p-5">

        <div class="form-group">
            <label>@lang('site.name')</label>
            <input readonly type="text" name="name" class="form-control" value="{{ $contact->name}}">
        </div>

        <div class="form-group">
            <label>@lang('site.email')</label>
            <input readonly type="email" name="email" class="form-control" value="{{ $contact->email }}">
        </div>

        <div class="form-group">
            <label>@lang('site.phone')</label>
            <input type="text" readonly name="phone" class="form-control" value="{{ $contact->phone }}">
        </div>
        <div class="form-group">
            <label>@lang('site.subject')</label>
            <input type="text" readonly name="subject" class="form-control" value="{{ $contact->subject }}">
        </div>
        <div class="form-group">
            <label>@lang('site.message')</label>
            <input type="text" readonly name="message" class="form-control" value="{{ $contact->message }}">
        </div>


{{--   reply to message     --}}
        <form action="{{ route('dashboard.reply-message',['id'=>$contact->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>@lang('site.reply')</label>
                <textarea name="reply" class="form-control" id="" cols="30" rows="5" ></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right"> @lang('site.replay-message')</button>
            </div>
        </form>
    </div><!-- end of box body -->




@endsection
