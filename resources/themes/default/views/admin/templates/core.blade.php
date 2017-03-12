<!DOCYTYPE html>
<html>
    <head>
        <title>{{ config('catchupcms.company.name') }} — Admin</title>
        <meta charset="utf-8">
        <meta title="description" content="Description of Blog">

        <link href="{!! Theme::asset('css/materialize.css') !!}">
        @yield('head')
    </head>
    <body>
        @yield('body')

        <script src="{!! Theme::asset('js/all.js') !!}"></script>
        @yield('scripts')

        @include('default::admin.templates.footer')
    </body>
</html>