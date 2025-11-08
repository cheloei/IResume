<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>وبلاگ {{$resume->persion->name}} - @section('title') بدون عنوان @show
        <link rel="shortcut icon" href="{{asset('assets/main/assets/images/logo.png')}}" type="image/x-icon">
    </title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/blog/Theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/blog/Theme/css/bootstrap.rtl.min.css') }}">
    <style>
        a{
            text-decoration: none;
        }
    </style>
    @yield('head')
</head>

<body dir="rtl">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand"
                href="#">{{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (empty($__env->yieldContent('dash')))
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ env('APP_URL') . '/blog/' . $resume->id }}">خانه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ env('APP_URL') . '/' . $resume->id }}">رزومه من</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                دسته بندی
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $cate)
                                    <li><a class='dropdown-item' href='{{env('APP_URL') . '/blog/' . $resume->id . '/category/' . $cate->id}}'>{{ $cate->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ route('admin') . '/' . $resume->id }}">انتشار پست جدید</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') . '/' . $resume->id }}/categories">مدیریت دسته
                                بندی ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') . '/' . $resume->id }}/posts">مدیریت پست ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') . '/' . $resume->id }}/comments">مدیریت
                                نظرات</a>
                        </li>
                    </ul>
                @endif
                @if (empty($__env->yieldContent('dash')))
                    <form action="{{route('search')}}" method="post" class="d-flex">
                        @csrf
                        <input type="hidden" name="resume" value="{{$resume->id}}">
                        <input class="form-control me-2" name="word" type="text" placeholder="جستجو کردن در وبلاگ"
                            aria-label="Search" value="{{request('word')}}">
                        <button class="btn btn-outline-success" name="btnSearch">جستجو</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
    <section class="home py-5" id="home">
        <div class="container-lg">
            <div class="row align-items-center align-content-center">
                <div class="col-md-12 mt-4 mt-md-0">
                    <div class="home-img text-center bg-secondary py-4"  style="background-image: url({{ !empty($resume->poster) ? env('i_Resume_Files_URL') . '/images/poster/' . $resume->poster : env('APP_URL') . '/assets/blog/Theme/img/back.png' }})">
                        <img src="{{ !empty($resume->persion->profile) ? env('i_Resume_Files_URL') . '/images/profile/' . $resume->persion->profile : asset('assets/blog/Theme/img/profile.jpg') }}"
                            width="250px" height="250px" class="rounded-circle mx-auto d-block" alt="profile img">
                    </div>
                </div>
            </div>
            @yield('page')
        </div>

    </section>
    <footer class="footer border-top py-4">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12">
                    <p class="m-0 text-center text-danger text-muted">&copy; تمامی حقوق این سایت برای <a href="{{route('main')}}">رزومه ساز آی رزومه</a> محفوظ است</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/blog/Theme/js/bootstrap.bundle.min.js') }}"></script>
    @yield('script')
</body>

</html>
