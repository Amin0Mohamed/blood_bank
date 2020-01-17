@component('mail::message')
# Introduction

<div class="alert alert-danger">
    <strong>Name: </strong> {{$data['name']}}
    <br>
    <strong>email: </strong> {{$data['email']}}
    <br>
    <strong>phone: </strong> {{$data['phone']}}
    <br>
    <strong>message: </strong> {{$data['message']}}
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
