<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>آی رزومه - @section('title') بدون عنوان @show
    </title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (empty($__env->yieldContent('bootstrap-less')))
        <link rel="stylesheet" href="{{asset('assets/laravelDefault/css/plugin/bootstrap.css')}}">
    @endif
    <link rel="shortcut icon" href="{{asset('assets/main/assets/images/logo.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @yield('head')
</head>

<body>
    @yield('content')
    @if (empty($__env->yieldContent('bootstrap-less')))
        <script src="{{asset('assets/laravelDefault/js/plugin/bootstrap.js')}}"></script>
    @endif
    @yield('script')
</body>

</html>
