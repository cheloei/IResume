@extends('layouts.baseHtml')
@section('title')
    رزومه {{$resume->persion->name}}
@endsection
@section('bootsrap-less', true)
@section('head')
    <link href="{{ asset('assets/template/DevFolio/vendor/bootstrap/js/bootstrap.min.js') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/DevFolio/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/DevFolio/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/DevFolio/css/fa.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/xfont.css') }}">
@endsection
@section('content')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a
                    href="index.html">{{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }}</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">خانه</a></li>
                    <li><a class="nav-link scrollto" href="#about">درباره من</a></li>
                    <li><a class="nav-link scrollto" id="pi" href="#services">شبکه های اجتماعی</a></li>
                    @if ($resume->portfolio()->count() > 0)
                        <li><a class="nav-link scrollto " href="#work">نمونه کار</a></li>
                    @endif
                    <li><a class="nav-link scrollto" href="#contact">ارتباط با من</a></li>
                    <li><a class="nav-link scrollto" href="{{ $resume->id }}/print" target="_blank">دانلود رزومه</a></li>
                    <li><a class="nav-link" href="blog/{{ $resume->id }}" target="_blank">مشاهده وبلاگ</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <div id="hero" class="hero route bg-image"
        style="background-image: url({{ !empty($resume->poster) ? env('i_Resume_Files_URL') . '/images/poster/' . $resume->poster : env('APP_URL') . '/assets/sneat/assets/img/nature.jpg' }})">
        <div class="overlay-itro"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <!--<p class="display-6 color-d">Hello, world!</p>-->
                    <h1 class="hero-title mb-4">من
                        {{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }} هستم</h1>
                    <p class="hero-subtitle"><span class="typed" @php
$skillText = ""; @endphp
                            @for ($i = 0; $i < $resume->skill() ->count(); $i++)
                            @php
                                $skillText .= $resume->skill[$i]->name;
                                if($i < $resume->skill()->count() - 1){
                                    $skillText .= ',';
                                }
                            @endphp @endfor
                            data-typed-items="{{ $skillText }}"></span></p>
                    <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
                </div>
            </div>
        </div>
    </div><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="about-img">
                                                <img src="" class="img-fluid rounded b-shadow-a" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-7">
                                            <div class="about-info">
                                                <p><span class="title-s">نام: </span>
                                                    <span>{{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }}</span>
                                                </p>
                                                <p><span class="title-s">تخصص: </span>
                                                    <span>{{ !empty($resume->persion->skill) ? $resume->persion->skill : '" تخصص شما "' }}</span>
                                                </p>
                                                <p dir="rtl"><span class="title-s">ایمیل: </span>
                                                    <span>{{ !empty($resume->callData->email) ? $resume->callData->email : '" ایمیل شما "' }}</span>
                                                </p>
                                                <p><span class="title-s">تلفن: </span>
                                                    <span>{{ !empty($resume->callData->phone) ? $resume->callData->phone : '" تلفن شما "' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($resume->skill()->count() > 0)
                                        <div class="skill-mf">
                                            <p class="title-s">مهارت ها</p>
                                            @foreach ($resume->skill as $skill)
                                                <span>{{ $skill->name }}</span> <span
                                                    class="pull-right">{{ $skill->level }}%</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $skill->level }}%;"
                                                        aria-valuenow="{{ $skill->level }}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="about-me pt-4 pt-md-0">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                درباره من
                                            </h5>
                                        </div>
                                        <textarea rows="10" style="height: fit-content; border: none; min-height: 100% !important; max-height: 100%; width: 100%; text-align: justify !important;"
                                            class="lead" disabled>{{ !empty($resume->persion->info) ? $resume->persion->info : '" متنی درباره شما که میتوانید در پنل تعیین کنید "' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services-mf pt-5 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                شبکه های اجتماعی
                            </h3>
                            <p class="subtitle-a">
                                :) ما رو در شبکه اجتماعی دنبال کن تا یه وقت گمت نکنیم
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">

                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        @if ($resume->portfolio()->count() > 0)
            <section id="work" class="portfolio-mf sect-pt4 route">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title-box text-center">
                                <h3 class="title-a">
                                    نمونه کار ها
                                </h3>
                                <p class="subtitle-a">
                                    :) میتونی چند تا از نمونه کار هامو ببینی و اگر دلت خواست , یکی برای خودت هم سفارش بدی
                                </p>
                                <div class="line-mf"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($resume->portfolio as $portfolio)
                            <div class="col-md-4">
                                <div class="work-box">
                                    <a href="{{ env('i_Resume_Files_URL') . '/images/portfolio/' . $portfolio->image }}"
                                        data-gallery="portfolioGallery" class="portfolio-lightbox">
                                        <div class="work-img">
                                            <img src="{{ env('i_Resume_Files_URL') . '/images/portfolio/' . $portfolio->image }}"
                                                alt="" class="img-fluid">
                                        </div>
                                    </a>
                                    <div class="work-content">
                                        <div class="row">
                                            <div class="col-sm-8 d-flex flex-column justify-content-center">
                                                <h2 class="w-title">{{ $portfolio->title }}</h2>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="w-like">
                                                    <a href="{{ $portfolio->url }}" style="font-size: large;"
                                                        target="_blank"> <span
                                                            class="bi bi-box-arrow-up-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section><!-- End Portfolio Section -->
        @endif

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route">
            <div class="overlay-mf"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-mf">
                            <div id="contact" class="box-shadow-full">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                ارسال پیام
                                            </h5>
                                        </div>
                                        <div>
                                            <form action="{{ route('sendMassage') }}" method="post"
                                                class="php-email-form">
                                                @csrf
                                                <input type="hidden" name="resume" value="{{ $resume->id }}">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control"
                                                                id="name" placeholder="نام" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="ایمیل" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="subject"
                                                                id="subject" placeholder="عنوان" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" rows="5" placeholder="متن پیام" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center my-3">
                                                        <div class="loading">در حال بارگزاری</div>
                                                        <div class="error-message"></div>
                                                        <div class="sent-message">پام با موفقیت ارسال شد :)
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit"
                                                            class="button button-a button-big button-rouded">ارسال
                                                            پیام</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-box-2 pt-4 pt-md-0">
                                            <h5 class="title-left">
                                                ارتباط با ما
                                            </h5>
                                        </div>
                                        <div class="more-info">
                                            <p class="lead">
                                                در صورت لزوم میتوانید از طریق راه های زیر با ما در ارتباط باشید
                                            </p>
                                            <ul class="list-ico" dir="rtl">
                                                @if (!empty($resume->persion->address))
                                                    <li><span class="bi bi-geo-alt"></span>
                                                        {{ $resume->persion->address }}</li>
                                                @endif
                                                <li><span class="bi bi-phone"></span> {{ $resume->callData->phone }}</li>
                                                <li><span class="bi bi-envelope"></span> {{ $resume->callData->email }}
                                                </li>
                                                <li>
                                                    @if (!empty($resume->persion->map))
                                                        <iframe
                                                            src="https://balad.ir/embed?p={{ explode('/p/', $resume->persion->map)[1] }}"
                                                            frameborder="0" style="border:0;" id="map-frame"
                                                            allowfullscreen="" aria-hidden="false" tabindex="0"
                                                            class="w-100 mx-auto"></iframe>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <p class="copyright">&copy; ساخته شده با <a href="{{ route('main') }}" target="_blank">آی
                                رزومه</a>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
@section('script')
    <script src="{{ asset('assets/template/DevFolio/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/template/DevFolio/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/template/DevFolio/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/template/DevFolio/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('assets/template/DevFolio/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/template/DevFolio/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        const callData = [{
                name: 'روبیکا',
                link: '{!! $resume->callData->rubika !!}',
                icon: 'xf xf-robika'
            },
            {
                name: 'بله',
                link: '{!! $resume->callData->bale !!}',
                icon: 'xf xf-bale'
            },
            {
                name: 'ایتا',
                link: '{!! $resume->callData->eitaa !!}',
                icon: 'xf xf-eitaa'
            },
            {
                name: 'آپارات',
                link: '{!! $resume->callData->aparat !!}',
                icon: 'xf xf-aparat'
            },
            {
                name: 'گپ',
                link: '{!! $resume->callData->gap !!}',
                icon: 'xf xf-gap'
            },
            {
                name: 'تلگرام',
                link: '{!! $resume->callData->telegram !!}',
                icon: 'bx bxl-telegram'
            },
            {
                name: 'فیسبوک',
                link: '{!! $resume->callData->facebook !!}',
                icon: 'bx bxl-facebook'
            },
            {
                name: 'توئیتر',
                link: '{!! $resume->callData->twitter !!}',
                icon: 'bx bxl-twitter'
            },
            {
                name: 'اینستاگرام',
                link: '{!! $resume->callData->instagram !!}',
                icon: 'bx bxl-instagram'
            },
            {
                name: 'یوتیوب',
                link: '{!! $resume->callData->youtube !!}',
                icon: 'bx bxl-youtube'
            },
            {
                name: 'گیتهاب',
                link: '{!! $resume->callData->github !!}',
                icon: 'bx bxl-github'
            },
            {
                name: 'لینکدین',
                link: '{!! $resume->callData->linkedin !!}',
                icon: 'bx bxl-linkedin'
            }
        ];

        var CallFind = false;

        callData.forEach(element => {
            if (element.link != null && element.link != '') {
                CallFind = true;
                $('#services > .container > .d-flex').append(
                    ` <div class="col-4 col-md-3 col-lg-2"><a href="${element.link}" target="_blank"><div class="service-box" style="width: fit-content; height: fit-content;"><div class="service-ico"><span class="ico-circle"><i class="${element.icon} fs-3"></i></span></div></div></a></div> `
                );
            }
        });
        if (!CallFind) {
            $('#services, #pi').hide();
        }
    </script>
@endsection
