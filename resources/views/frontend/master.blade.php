<!DOCTYPE html>
<html lang="{{config('app.local')}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    @include('frontend.layout.partials.head')

    @yield('head')
    <livewire:styles>
</head>

<body id="commerce">

@include('frontend.layout.partials.navbar')

@yield('content')

@include('frontend.layout.partials.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
@yield('footer')
<livewire:scripts>
</body>

</html>
