{!! Form::open(['action' => 'Auth\AuthController@login']) !!}
{!! Form::label('email', 'Email') !!}
{!! Form::text('email', null, ['class' => '']) !!}
{!! Form::label('password', 'Password') !!}
{!! Form::password('password', ['class' => '']) !!}
{!! Form::submit('Submit') !!}
{!! Form::close() !!}