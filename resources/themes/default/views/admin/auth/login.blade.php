<!doctype html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex,nofollow">
        <link rel="stylesheet" href="{{ Theme::asset('css/materialize.css') }}">
    </head>
    <body>
        <div class="row">
            <div class="card-panel center col s12 m6 offset-m3">

                <nav>
                    <div class="nav-wrapper">
                        <a href="#" class="brand-logo center">Logo</a>
                    </div>
                </nav>

                {!! Form::open(['action' => 'Auth\AuthController@login']) !!}
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('email', null, ['class' => '']) !!}
                        {!! Form::label('email', 'Email') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => '']) !!}
                        {!! Form::submit('Submit', ['class' => 'btn waves-effect waves-light']) !!}
                        {!! Html::link('/admin/forgotpassword', 'Forgot Password', ['class' => 'btn waves-effect waves-light']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="{{ Theme::asset('js/all.js') }}"></script>
    </body>
</html>