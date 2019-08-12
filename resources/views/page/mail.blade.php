@extends('master')

@section('content')
    {!! Form::open(array('route' => 'send_mail')) !!}
    <div>
        <label class="email"> Your name</label>
        {!! Form::text('name', null, ['class' => 'input-text', 'placehoder' => "Your name"]) !!}
    </div>

    <div>
        <label class="email">Your email</label>
            {!! Form::email('email',null, ['class' => 'input-email', 'placehoder' => "Your email"]) !!}
    </div>
    <div>

        <label class="email">Message</label>
        {!! Form::text('content', null, ['class' => 'input-content', 'placehoder' => 'Enter message']) !!}
    </div>
    <div>
        {!! Form::submit('Send', ['class' => 'button']) !!}
    </div>
    {!! Form::close() !!}
