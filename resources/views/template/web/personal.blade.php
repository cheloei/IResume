@extends('layouts.baseHtml')
@section('title')
    رزومه {{ $resume->persion->name }}
@endsection
@section('bootsrap-less', true)
@section('head')
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="{{ asset('assets/template/personal/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/personal/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/personal/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/personal/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/personal/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/personal/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template/personal/css/' . $theme . '.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/xfont.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')
    @if (Session::exists('success'))
        <script>
            swal('موفق', 'پیام مورد نظر با موفقیت ارسال شد', 'success', {
                button: true,
                button: 'ممنون :)',
                timer: 5000
            });
        </script>
    @elseif (Session::exists('error'))
        <script>
            swal('خطا', 'متاسفانه ارسال پیام با خطا روبرو شد', 'error', {
                button: true,
                button: 'فهمیدم',
                timer: 5000
            });
        </script>
    @endif
    <header id="header">
        <div class="container">

            <h1><a href="index.html">{{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }}</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
            <h2>{{ !empty($resume->persion->skill) ? $resume->persion->skill : '" تخصص شما "' }}</h2>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active" href="#header">خانه</a></li>
                    <li><a class="nav-link" href="#about">درباره من</a></li>
                    @if ($resume->experience || $resume->education)
                        <li><a class="nav-link" href="#resume">سوابق</a></li>
                    @endif
                    @if ($resume->portfolio)
                        <li><a class="nav-link" href="#portfolio">نمونه کار ها</a></li>
                    @endif
                    <li><a class="nav-link" href="#contact">رتباط با من</a></li>
                    <li><a class="nav-link" href="{{ $resume->id }}/print" target="_blank">دانلود رزومه</a></li>
                    <li><a class="nav-link" href="blog/{{ $resume->id }}" target="_blank">مشاهده وبلاگ</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="social-links">
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <!-- ======= About Me ======= -->
        <div class="about-me container">

            <div class="section-title">
                <h2>درباره من</h2>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="{{ !empty($resume->persion->profile) ? env('i_Resume_Files_URL') . '/images/profile/' . $resume->persion->profile : env('APP_URL') . '/assets/sneat/assets/img/nature.jpg' }}"
                        class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>{{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }} -
                        {{ !empty($resume->persion->skill) ? $resume->persion->skill : '" تخصص شما "' }}</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>سال تولد:</strong>
                                    <span>{{ !empty($resume->persion->birth) ? $resume->persion->birth : '" سال تولد شما "' }}</span>
                                </li>
                                @if ($resume->persion->site)
                                    <li><i class="bi bi-chevron-right"></i> <strong>وبسایت:</strong>
                                        <span>{{ !empty($resume->callData->site) ? $resume->callData->site : '" وب سایت شما "' }}</span>
                                    </li>
                                @endif
                                <li><i class="bi bi-chevron-right"></i> <strong>تلفن :</strong>
                                    <span>{{ !empty($resume->callData->phone) ? $resume->callData->phone : '" تلفن شما "' }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>ایمیل :</strong>
                                    <span>{{ !empty($resume->callData->email) ? $resume->callData->email : '" تخصص شما "' }}</span>
                                </li>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p>{{ !empty($resume->persion->info) ? $resume->persion->info : '" بیوگرافی شما "' }}</p>
                </div>
            </div>

        </div><!-- End About Me -->

        <!-- ======= Skills  ======= -->
        <div class="skills container">

            <div class="section-title">
                <h2>مهارت ها</h2>
            </div>

            <div class="row skills-content" dir="ltr">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

                    @foreach ($resume->skill as $skill)
                        <div class="progress">
                            <span class="skill">{{ $skill->name }} <i class="val">{{ $skill->level }}%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->level }}"
                                    aria-valuemin="5" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </div><!-- End Skills -->

    </section><!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
        <div class="container">

            <div class="section-title">
                <h2>سوابق</h2>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <h3 class="resume-title">تحصیلات</h3>
                    @foreach ($resume->education as $edu)
                        <div class="resume-item">
                            <h4>{{ $edu->title }}</h4>
                            <h5>{{ $edu->from }} - {{ $edu->to }}</h5>
                            <p><em>{{ $edu->map }}</em></p>
                            <p>{{ $edu->desc }}</p>
                        </div>ّ
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <h3 class="resume-title">تجربیات کاری</h3>
                    @foreach ($resume->experience as $experience)
                        <div class="resume-item">
                            <h4>{{ $experience->name }}</h4>
                            <h5>{{ $experience->from }} - {{ $experience->to }}</h5>
                            <p><em>{{ $experience->map }}</em></p>
                            <p>
                            <ul>
                                <li>{{ $experience->desc }}</li>
                            </ul>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>نمونه کار ها</h2>
            </div>

            <div class="row portfolio-container">

                @foreach ($resume->portfolio as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ !empty($portfolio->image) ? env('i_Resume_Files_URL') . '/images/portfolio/' . $portfolio->image : asset('assets/sneat/assets/img/nature.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $portfolio->title }}</h4>
                                <p>{{ $portfolio->url }}</p>
                                <div class="portfolio-links">
                                    <a href="{{ !empty($portfolio->image) ? env('i_Resume_Files_URL') . '/images/portfolio/' . $portfolio->image : asset('assets/sneat/assets/img/nature.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfolio-lightbox"
                                        title="{{ $portfolio->title }}"><i class="bx bx-plus"></i></a>
                                    <a href="{{ $portfolio->url }}" target="_blank" title="مشاهده صفحه کار"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>ارتباط با من</h2>
            </div>

            <div class="row mt-2">

                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>آدرس من</h3>
                        <p>{{ $resume->persion->address }}</p>
                    </div>
                </div>

                <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-share-alt"></i>
                        <h3>شبکه های اجتماعی</h3>
                        <div class="social-links">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3>ایمیل من</h3>
                        <p>{{ $resume->callData->email }}</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-phone-call"></i>
                        <h3>شماره تماس من</h3>
                        <p>{{ $resume->callData->phone }}</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('sendMassage') }}" method="post" role="form" class="php-email-form mt-4">
                @csrf
                <input type="hidden" name="resume" value="{{ $resume->id }}">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="نام"
                            required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل"
                            required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="عنوان"
                        required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="متن پیام" required></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">در حال بارگزاری</div>
                    <div class="error-message"></div>
                    <div class="sent-message">پیام شما با موفقیت ارسال شد :)</div>
                </div>
                <div class="text-center"><button type="submit">ارسال پیام</button></div>
            </form>

            @if ($resume->persion->map)
                <div class="col-12 mt-4 align-items-stretch">
                    <div class="info-box">
                        <iframe src="https://balad.ir/embed?p={{ explode('/p/', $resume->persion->map)[1] }}"
                            frameborder="0" style="border:0;" id="map-frame" allowfullscreen="" aria-hidden="false"
                            tabindex="0" class="w-100 mx-auto"></iframe>
                    </div>
                </div>
            @endif

    </section><!-- End Contact Section -->

    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/personal-free-resume-bootstrap-template/ -->
        ساخته شده با <a href="{{ route('main') }}" target="_blank">آی رزومه</a>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/template/personal/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/template/personal/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/template/personal/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/template/personal/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/template/personal/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/template/personal/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/template/personal/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/template/personal/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        const style = document.createElement('style');
        style.textContent = `
body::before {
    content: "";
    position: fixed;
    background: rgba(0,0,0,.6) url(${"{!! !empty($resume->poster)
        ? env('i_Resume_Files_URL') . '/images/poster/' . $resume->poster
        : env('APP_URL') . '/assets/sneat/assets/img/nature.jpg' !!}"}) top right no-repeat;
    background-size: cover;
    left: 0;
    right: 0;
    top: 0;
    height: 100vh;
    z-index: -1;
    background-blend-mode : multiply;
}
`;
        document.head.appendChild(style);
    </script>

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
                $('.info-box > .social-links').append(
                    ` <a href="${element.link}" target="_blank"><i class="${element.icon} fs-2"></i></a> `
                );
                $('#header .social-links').append(
                    ` <a href="${element.link}" target="_blank"><i class="${element.icon} fs-3"></i></a> `
                );
            }
        });
        if (!CallFind) {
            $('.info-box > .social-links').parant().parent().css('visibility', 'hidden');
        }
    </script>

@endsection
