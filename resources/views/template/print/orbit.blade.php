<div class="print-container my-4 mx-auto">
    <div id="print-section" dir="rtl">
        <link id="theme-style" rel="stylesheet" href="{{ asset('assets/template/orbit/css/orbit-' . $resume->print . '.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/template/orbit/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link id="theme-style" rel="stylesheet" href="{{ asset('assets/template/orbit/css/fa.css') }}">
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <div class="profile-container">
                    <img class="profile" src="{{ !empty($resume->persion->profile) ? env('i_Resume_Files_URL') . '/images/profile/' . $resume->persion->profile : asset('assets/sneat/assets/img/nature.jpg') }}" alt="" />
                    <h1 class="name">{{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }}
                    </h1>
                    <h3 class="tagline">{{ !empty($resume->persion->skill) ? $resume->persion->skill : '" تخصص شما "' }}
                    </h3>
                </div><!--//profile-container-->

                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list" id="profiles">
                        <li class="email"><i class="fa-solid fa-envelope"></i><a
                                href="mailto: yourname@email.com">{{ !empty($resume->callData->email) ? $resume->callData->email : '" ایمیل شما "' }}</a>
                        </li>
                        <li class="phone"><i class="fa-solid fa-phone"></i><a
                                href="tel:{{ !empty($resume->callData->phone) ? $resume->callData->phone : '" تلفن شما "' }}">{{ !empty($resume->callData->phone) ? $resume->callData->phone : '" تلفن شما "' }}</a>
                        </li>
                        <li class="website"><i class="fa-solid fa-globe"></i><a
                                href="{{ !empty($resume->callData->site) ? $resume->callData->site : '" وبسایت شما "' }}"
                                target="_blank">{{ !empty($resume->callData->site) ? $resume->callData->site : '" وبسایت شما "' }}</a>
                        </li>
                    </ul>
                </div><!--//contact-container-->
                @if ($resume->education()->count() > 0)
                    <div class="education-container container-block">
                        <h2 class="container-block-title">تحصیلات</h2>
                        @foreach ($resume->education as $edu)
                            <div class="item">
                                <h4 class="degree">{{ $edu->name }}</h4>
                                <h5 class="meta">{{ $edu->map }}</h5>
                                <div class="time">{{ $edu->from }} - {{ $edu->to }}</div>
                            </div>
                        @endforeach
                    </div><!--//education-container-->
                @endif

                @if ($resume->grammer()->count() > 0)
                    <div class="languages-container container-block">
                        <h2 class="container-block-title">مهارت گرامری</h2>
                        <ul class="list-unstyled interests-list">
                            @foreach ($resume->grammer as $gr)
                                <li>{{ $gr->lang['name'] }} <span class="lang-desc">( {{ $gr->level['name'] }}
                                        )</span></li>
                            @endforeach
                        </ul>
                    </div><!--//interests-->
                @endif

                @if (!empty($resume->persion->confrontation))
                    <div class="interests-container container-block">
                        <h2 class="container-block-title">منافع</h2>
                        <ul class="list-unstyled interests-list">
                            @foreach (explode("\n", $resume->persion->confrontation) as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div><!--//interests-->
                @endif

            </div><!--//sidebar-wrapper-->

            <div class="main-wrapper">

                <section class="section summary-section">
                    <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-user"></i></span>درباره من
                    </h2>
                    <div class="summary">
                        <p>{{ !empty($resume->persion->info) ? $resume->persion->info : '" متنی درباره شما که میتوانید در پنل تعیین کنید "' }}
                        </p>
                    </div><!--//summary-->
                </section><!--//section-->

                @if ($resume->experience()->count() > 0)
                    <section class="section experiences-section">
                        <h2 class="section-title"><span class="icon-holder"><i
                                    class="fa-solid fa-briefcase"></i></span>تجربیات</h2>
                        @foreach ($resume->experience as $item)
                            <div class="item">
                                <div class="meta">
                                    <div class="upper-row">
                                        <h3 class="job-title">{{ $item->name }}</h3>
                                        <div class="time">{{ $item->from }} - {{ $item->to }}</div>
                                    </div><!--//upper-row-->
                                    <div class="company">{{ $item->map }}</div>
                                </div><!--//meta-->
                                <div class="details">
                                    <p>{{ $item->desc }}</p>
                                </div><!--//details-->
                            </div><!--//item-->
                        @endforeach
                    </section><!--//section-->
                @endif

                @if ($resume->portfolio()->count() > 0)
                    <section class="section projects-section">
                        <h2 class="section-title"><span class="icon-holder"><i
                                    class="fa-solid fa-archive"></i></span>پروژه ها
                        </h2>
                        <div class="intro">
                            <p>در زیر میتوانید چند مورد از نمونه کار های من رو مشاهده کنید</p>
                        </div><!--//intro-->
                        @foreach ($resume->portfolio as $item)
                            <div class="item" dir="ltr">
                                <span class="project-title"><a href="{{ $item->url }}"
                                        target="_blank">{{ $item->title }}</a></span> => <span
                                    class="project-tagline">{{ $item->url }}</span>
                            </div><!--//item-->
                        @endforeach
                    </section><!--//section-->
                @endif

                @if ($resume->skill()->count() > 0)
                    <section class="skills-section section">
                        <h2 class="section-title"><span class="icon-holder"><i
                                    class="fa-solid fa-rocket"></i></span>مهارت ها</h2>
                        <div class="skillset" dir="ltr">
                            @foreach ($resume->skill as $skill)
                                <div class="item">
                                    <h3 class="level-title">{{$skill->name}}</h3>
                                    <div class="progress level-bar">
                                        <div class="progress-bar theme-progress-bar" role="progressbar"
                                            style="width: {{$skill->level}}%" aria-valuenow="{{$skill->level}}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div><!--//item-->
                            @endforeach
                        </div>
                    </section><!--//skills-section-->
                @endif

            </div><!--//main-body-->
        </div>
    </div>
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

        callData.forEach(element => {
            if (element.link != null && element.link != '') {
                $('#profiles').append(
                    ` <li><i class="${element.icon} fas fs-1-5"></i><a href="${element.link}" target="_blank">${element.link}</a></li> `
                );
            }
        });
    </script>
</div>
