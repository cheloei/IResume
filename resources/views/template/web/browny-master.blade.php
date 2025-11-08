@extends('layouts.baseHtml')
@section('title')
    رزومه {{$resume->persion->name}}
@endsection
@section('bootstrap-less', true)
@section('head')
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/bootsnav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/fa.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/browny-master/css/responsive.css') }}">
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
    <div class="main-content">
        <header class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav navbar-fixed dark no-background">

                    <div class="container">

                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand"
                                href="index.html">{{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }}</a>
                        </div><!--/.navbar-header-->
                        <!-- End Header Navigation -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                <li><a class="nav-link" href="blog/{{ $resume->id }}" target="_blank">مشاهده وبلاگ</a></li>
                                <li class="smooth-menu"><a href="#contact">ارتباط با من</a></li>
                                @if ($resume->portfolio()->count() > 0)
                                    <li class="smooth-menu"><a href="#portfolio">نمونه کار</a></li>
                                @endif
                                <li class="smooth-menu" id="pi"><a href="#profiles">شبکه اجتماعی</a></li>
                                @if ($resume->experience()->count() > 0)
                                    <li class="smooth-menu"><a href="#experience">تجربه</a></li>
                                @endif
                                @if ($resume->skill()->count() > 0)
                                    <li class="smooth-menu"><a href="#skills">توانایی ها</a></li>
                                @endif
                                @if ($resume->education()->count() > 0)
                                    <li class=" smooth-menu"><a href="#education">تحصیلات</a></li>
                                @endif
                            </ul><!--/.nav -->
                        </div><!-- /.navbar-collapse -->
                    </div><!--/.container-->
                </nav><!--/nav-->
                <!-- End Navigation -->
            </div><!--/.header-area-->

            <div class="clearfix"></div>

        </header><!-- /.top-area-->
        <!-- top-area End -->

        <!--welcome-hero start -->
        <section id="welcome-hero"
            style="background-image: url({{ !empty($resume->poster) ? env('i_Resume_Files_URL') . '/images/poster/' . $resume->poster : env('APP_URL') . '/assets/sneat/assets/img/nature.jpg' }}"
            class="welcome-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="header-text" style="direction: rtl;">
                            <h2>سلام <span>,</span> من <br>
                                {{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }} <br> هستم
                                <span>.</span>
                            </h2>
                            <p>{{ !empty($resume->persion->skill) ? $resume->persion->skill : '" تخصص شما "' }}</p>
                            <a href="{{ $resume->id }}/print" target="_black">دانلود زرومه</a>
                        </div><!--/.header-text-->
                    </div><!--/.col-->
                </div><!-- /.row-->
            </div><!-- /.container-->

        </section><!--/.welcome-hero-->
        <!--welcome-hero end -->

        <!--about start -->
        <section id="about" class="about">
            <div class="section-heading text-center">
                <h2>درباره من</h2>
            </div>
            <div class="container">
                <div class="about-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="single-about-txt">
                                <p>{{ !empty($resume->persion->info) ? $resume->persion->info : '" متنی درباره شما که میتوانید در پنل تعیین کنید "' }}
                                </p>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="single-about-add-info">
                                            <h3>شماره تماس</h3>
                                            <p>{{ !empty($resume->callData->phone) ? $resume->callData->phone : '" تلفن شما "' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="single-about-add-info">
                                            <h3>ایمیل</h3>
                                            <p>{{ !empty($resume->callData->email) ? $resume->callData->email : '" ایمیل شما "' }}
                                            </p>
                                        </div>
                                    </div>
                                    @if (!empty($resume->callData->site))
                                        <div class="col-sm-4">
                                            <div class="single-about-add-info">
                                                <h3>وبسایت</h3>
                                                <p>{{ !empty($resume->callData->site) ? $resume->callData->site : '" وبسایت شما "' }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-offset-1 col-sm-5">
                            <div class="single-about-img">
                                <img src="{{ !empty($resume->persion->profile) ? env('i_Resume_Files_URL') . '/images/profile/' . $resume->persion->profile : asset('assets/sneat/assets/img/nature.jpg') }}"
                                    alt="profile_image">
                                <div class="about-list-icon" style="height: fit-content;">
                                    <ul style="display: flex; justify-content: space-around; flex-wrap: wrap; padding:2rem;"
                                        id="profileCall">


                                    </ul><!-- / ul -->
                                </div><!-- /.about-list-icon -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section><!--/.about-->
        <!--about end -->

        <!--education start -->
        @if ($resume->education()->count() > 0)
            <section id="education" class="education">
                <div class="section-heading text-center">
                    <h2>تحصیلات</h2>
                </div>
                <div class="container">
                    <div class="education-horizontal-timeline">
                        <div class="row">
                            @foreach ($resume->education as $edu)
                                <div class="col-sm-4" style="margin-bottom: 3rem;">
                                    <div class="single-horizontal-timeline">
                                        <div class="experience-time">
                                            <h2>{{ $edu->from }} - {{ $edu->to }}</h2>
                                            {{ $edu->name }}
                                        </div><!--/.experience-time-->
                                        <div class="timeline-horizontal-border">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <span class="single-timeline-horizontal"></span>
                                        </div>
                                        <div class="timeline">
                                            <div class="timeline-content">
                                                <h4 class="title">
                                                    {{ $edu->map }}
                                                </h4>
                                                <p class="description">{{ $edu->desc }}</p>
                                            </div><!--/.timeline-content-->
                                        </div><!--/.timeline-->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </section><!--/.education-->
        @endif
        <!--education end -->

        <!--skills start -->
        @if ($resume->skill()->count() > 0)
            <section id="skills" class="skills">
                <div class="skill-content">
                    <div class="section-heading text-center">
                        <h2>توانایی ها</h2>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="single-skill-content d-flex flex-wrap justify-content-between">
                                    @foreach ($resume->skill as $skill)
                                        <div class="barWrapper col-md-6">
                                            <span class="progressText">{{ $skill->name }}</span>
                                            <div class="single-progress-txt">
                                                <div class="progress ">
                                                    <div class="progress-bar" role="progressbar"
                                                        aria-valuenow="{{ $skill->level }}" aria-valuemin="5"
                                                        aria-valuemax="100" style="">

                                                    </div>
                                                </div>
                                                <h3>{{ $skill->level }} %</h3>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div> <!-- /.container -->
                </div><!-- /.skill-content-->

            </section><!--/.skills-->
        @endif
        <!--skills end -->

        <!--experience start -->
        @if ($resume->experience()->count() > 0)
            <section id="experience" class="experience">
                <div class="section-heading text-center">
                    <h2>تجربه</h2>
                </div>
                <div class="container">
                    <div class="experience-content">
                        <div class="main-timeline">
                            <ul>
                                @for ($i = 1; $i <= $resume->experience()->count(); $i++)
                                    @if ($i % 2 != 0)
                                        <li>
                                            <div class="single-timeline-box fix">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="experience-time text-right">
                                                            <h2>{{ $resume->experience[$i - 1]->to }} -
                                                                {{ $resume->experience[$i - 1]->from }}</h2>
                                                            <h3>{{ $resume->experience[$i - 1]->name }}</h3>
                                                        </div><!--/.experience-time-->
                                                    </div><!--/.col-->
                                                    <div class="col-md-offset-1 col-md-5">
                                                        <div class="timeline">
                                                            <div class="timeline-content">
                                                                <h4 class="title">
                                                                    <span><i class="fa fa-circle"
                                                                            aria-hidden="true"></i></span>
                                                                    {{ $resume->experience[$i - 1]->map }}
                                                                </h4>
                                                                <p class="description">
                                                                    {{ $resume->experience[$i - 1]->desc }}
                                                                </p>
                                                            </div><!--/.timeline-content-->
                                                        </div><!--/.timeline-->
                                                    </div><!--/.col-->
                                                </div>
                                            </div><!--/.single-timeline-box-->
                                        </li>
                                    @else
                                        <li>
                                            <div class="single-timeline-box fix">
                                                <div class="row">
                                                    <div class="col-md-offset-1 col-md-5 experience-time-responsive">
                                                        <div class="experience-time">
                                                            <h2>
                                                                <span><i class="fa fa-circle"
                                                                        aria-hidden="true"></i></span>
                                                                {{ $resume->experience[$i - 1]->to }} -
                                                                {{ $resume->experience[$i - 1]->from }}
                                                            </h2>
                                                            <h3>{{ $resume->experience[$i - 1]->name }}</h3>
                                                        </div><!--/.experience-time-->
                                                    </div><!--/.col-->
                                                    <div class="col-md-5">
                                                        <div class="timeline">
                                                            <div class="timeline-content text-right">
                                                                <h4 class="title">
                                                                    {{ $resume->experience[$i - 1]->map }}
                                                                </h4>
                                                                <p class="description">
                                                                    {{ $resume->experience[$i - 1]->desc }}
                                                                </p>
                                                            </div><!--/.timeline-content-->
                                                        </div><!--/.timeline-->
                                                    </div><!--/.col-->
                                                    <div class="col-md-offset-1 col-md-5 experience-time-main">
                                                        <div class="experience-time">
                                                            <h2>
                                                                <span><i class="fa fa-circle"
                                                                        aria-hidden="true"></i></span>
                                                                {{ $resume->experience[$i - 1]->to }} -
                                                                {{ $resume->experience[$i - 1]->from }}
                                                            </h2>
                                                            <h3>{{ $resume->experience[$i - 1]->name }}</h3>
                                                        </div><!--/.experience-time-->
                                                    </div><!--/.col-->
                                                </div>
                                            </div><!--/.single-timeline-box-->
                                        </li>
                                    @endif
                                @endfor

                            </ul>
                        </div><!--.main-timeline-->
                    </div><!--.experience-content-->
                </div>

            </section><!--/.experience-->
        @endif
        <!--experience end -->

        <!--profiles start -->
        <section id="profiles" class="profiles">
            <div class="profiles-details">
                <div class="section-heading text-center">
                    <h2>شبکه اجتماعی</h2>
                </div>
                <div class="container">
                    <div class="profiles-content">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>

        </section><!--/.profiles-->
        <!--profiles end -->

        <!--portfolio start -->
        @if ($resume->portfolio()->count() > 0)
            <section id="portfolio" class="portfolio">
                <div class="portfolio-details">
                    <div class="section-heading text-center">
                        <h2>نمونه کار</h2>
                    </div>
                    <div class="container">
                        <div class="portfolio-content">
                            <div class="isotope">
                                <div class="row">
                                    @foreach ($resume->portfolio as $portfolio)
                                        <div class="item col-6 col-md-4 col-lg-3" style="height:200px;">
                                            <img src="{{ env('i_Resume_Files_URL') . '/images/portfolio/' . $portfolio->image }}"
                                                alt="portfolio image" />
                                            <div class="isotope-overlay">
                                                <a href="{{ $portfolio->url }}">
                                                    {{ $portfolio->title }}
                                                </a>
                                            </div><!-- /.isotope-overlay -->
                                        </div>
                                    @endforeach
                                </div><!-- /.row -->
                            </div><!--/.isotope-->
                        </div><!--/.gallery-content-->
                    </div><!--/.container-->
                </div><!--/.portfolio-details-->

            </section><!--/.portfolio-->
        @endif
        <!--portfolio end -->

        <!--contact start -->
        <section id="contact" class="contact">
            <div class="section-heading text-center">
                <h2>ارتباط با من</h2>
            </div>
            <div class="container">
                <div class="contact-content">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5 col-sm-6">
                            <div class="single-contact-box">
                                <div class="contact-form">
                                    <form method="POST" action="{{route('sendMassage')}}">
                                        @csrf
                                        <input type="hidden" name="resume" value="{{$resume->id}}">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input dir="ltr" type="email" class="form-control"
                                                        id="email" placeholder="ایمیل" name="email" required>
                                                </div><!--/.form-group-->
                                            </div><!--/.col-->
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="نام" name="name" required>
                                                </div><!--/.form-group-->
                                            </div><!--/.col-->
                                        </div><!--/.row-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="subject"
                                                        placeholder="عنوان پیام" name="subject" required>
                                                </div><!--/.form-group-->
                                            </div><!--/.col-->
                                        </div><!--/.row-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="8" id="comment" placeholder="متن پیام" name="message" required></textarea>
                                                </div><!--/.form-group-->
                                            </div><!--/.col-->
                                        </div><!--/.row-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="single-contact-btn">
                                                    <button class="contact-btn w-100" type="submit">ارسال</button>
                                                </div><!--/.single-single-contact-btn-->
                                            </div><!--/.col-->
                                        </div><!--/.row-->
                                    </form><!--/form-->
                                </div><!--/.contact-form-->
                            </div><!--/.single-contact-box-->
                        </div><!--/.col-->
                        <div class="col-md-offset-1 col-md-5 col-sm-6">
                            <div class="single-contact-box">
                                <div class="contact-adress">
                                    <div class="contact-add-head">
                                        <h3>{{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }}
                                        </h3>
                                        <p>{{ !empty($resume->persion->skill) ? $resume->persion->skill : '" تخصص شما "' }}
                                        </p>
                                    </div>
                                    <div class="contact-add-info">
                                        <div class="single-contact-add-info">
                                            <h3>شماره تماس</h3>
                                            <p>{{ !empty($resume->callData->phone) ? $resume->callData->phone : '" تلفن شما "' }}
                                            </p>
                                        </div>
                                        <div class="single-contact-add-info">
                                            <h3>ایمیل</h3>
                                            <p>{{ !empty($resume->callData->email) ? $resume->callData->email : '" ایمیل شما "' }}
                                            </p>
                                        </div>
                                        @if (!empty($resume->callData->site))
                                            <div class="single-contact-add-info">
                                                <h3>وبسایت</h3>
                                                <p>{{ $resume->callData->site }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div><!--/.contact-adress-->
                                <div class="hm-foot-icon">
                                    <ul></ul><!--/ul-->
                                </div><!--/.hm-foot-icon-->
                            </div><!--/.single-contact-box-->
                        </div><!--/.col-->
                    </div><!--/.row-->
                </div><!--/.contact-content-->
            </div><!--/.container-->

        </section><!--/.contact-->
        <!--contact end -->

        <!--footer-copyright start-->
        <footer id="footer-copyright" class="footer-copyright">
            <div class="container">
                <div class="hm-footer-copyright text-center">
                    <p dir="rtl">
                        &copy; ساخته شده با  <a
                            href="{{route('main')}}" target="_blank">آی رزومه</a>
                    </p><!--/p-->
                </div><!--/.text-center-->
            </div><!--/.container-->

            <div id="scroll-Top">
                <div class="return-to-top">
                    <i class="fa fa-angle-up " id="scroll-top"></i>
                </div>

            </div><!--/.scroll-Top-->

        </footer><!--/.footer-copyright-->
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/template/browny-master/js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="{{ asset('assets/template/browny-master/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/template/browny-master/js/bootsnav.js') }}"></script>
    <script src="{{ asset('assets/template/browny-master/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/template/browny-master/js/progressbar.js') }}"></script>
    <script src="{{ asset('assets/template/browny-master/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/template/browny-master/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/template/browny-master/js/custom.js') }}"></script>
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
                $('.profiles-content > .row').append(
                    ` <div class="col col-6 col-md-4 col-lg-3"><div class="single-profile"><div class="profile-txt"><a href="${element.link}" target="_blank"><i class="${element.icon} fs-3"></i></a><div class="profile-icon-name">${element.name}</div></div><div class="single-profile-overlay"><div class="profile-txt"><a href="${element.link}"><i class="${element.icon} fs-3"></i></a><div class="profile-icon-name">${element.name}</div></div></div></div></div>`
                );
                $('#profileCall').append(
                    ` <li style="margin-top: 8px;"><a href="${element.link}" target="_blank"><i class="${element.icon} fs-3" aria-hidden="true"></i></a></li>`
                );
                $('.hm-foot-icon ul').append(
                    `<li><a href="${element.link}" target="_blank"><i class="${element.icon} fs-3"></i></a></li>`
                );
            }
        });
        if (!CallFind) {
            $('#profiles, #pi').hide();
        }
    </script>
@endsection
