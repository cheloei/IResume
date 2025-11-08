@extends('panel.baseHtml')
@section('title')
    ویرایش رزومه {{$resume->name}}
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/xfont.css') }}">
@endsection
@section('content')
    <div class="container-xxl">

        <div class="card w-75 h-25 my-5 mx-auto flow-less hidden" id="loading">
            <div class="card-body">
                <div class="spinner-border text-primary mx-auto" role="status">
                    <span class="visually-hidden">در حال بارگزاری ...</span>
                </div>
            </div>
        </div>

        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <form id="formEdit" class="mb-3 mt-5" action="index.html" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_id" value="{{ $resume->id }}">
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="app-brand justify-content-center">
                                <a href="index.html" class="app-brand-link gap-2">
                                    <img src="{{ asset('assets/main/assets/images/logo.png') }}" class="logo"
                                    alt="">
                                    <h3>آی رزومه</h3>
                                    
                                </a>
                            </div>
                            <!-- /Logo -->
                            <p class="mb-2 text-center">ویرایش رزومه</p>
                            <h4 class="mb-2 text-center mt-4">{{ $resume->name }}</h4>

                            <div class="mb-3 mx-auto" style="width: 85%;">
                                <label for="poster" class="form-label">پوستر وبسایت</label>
                                <div id="posterBox"
                                    style="width: 100%; height: 150px; background-image: url({{ !empty($resume->poster) ? env('i_Resume_Files_URL') . '/images/poster/' . $resume->poster : env('APP_URL') . '/assets/sneat/assets/img/nature.jpg' }})">
                                    <input type="file" class="form-control" id="poster" name="poster"
                                        style="width: 100%; height: 150px; opacity: 0;" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around">
                        <div class="mb-3 col-5 d-flex flex-column justify-content-center">

                            <div class="card">
                                <div class="card-body">
                                    <div class="">
                                        <label for="profile" class="form-label">عکس</label>
                                        <div id="profileBox" class="mx-auto"
                                            style="width: 85px; height: 85px; background-image: url({{ !empty($resume->persion->profile) ? env('i_Resume_Files_URL') . '/images/profile/' . $resume->persion->profile : env('APP_URL') . '/assets/sneat/assets/img/user.png' }})">
                                            <input type="file" class="form-control" id="profile" name="profile"
                                                style="width: 85px; height: 85px; opacity: 0;" accept="image/*" />
                                        </div>
                                    </div>

                                    <div class="w-75 mx-auto">
                                        <label for="persionName" class="form-label">نام</label>
                                        <input type="text" class="form-control" id="persionName" name="name"
                                            placeholder="چیزی بنویسید..." value="{{ $resume->persion->name }}" />
                                    </div>

                                    <div class="w-75 mx-auto">
                                        <label for="persionSkill" class="form-label">تخصص</label>
                                        <input type="text" class="form-control" id="persionSkill" name="persionSkill"
                                            placeholder="چیزی بنویسید..." value="{{ $resume->persion->skill }}" />
                                    </div>

                                    <div class="w-75 mx-auto">
                                        <label for="persionBirth" class="form-label">سال تولد</label>
                                        <input type="number" class="form-control" id="persionBirth" name="persionBirth"
                                            placeholder="چیزی بنویسید..." value="{{ $resume->persion->birth }}" />
                                    </div>

                                    <div class="w-75 mx-auto">
                                        <label for="MilitaryService" class="form-label">وضعیت سربازی</label>
                                        <select id="MilitaryService" id="" class="form-select">
                                            <option value="1" {{ $resume->persion->military == 1 && 'selected' }}>
                                                پایان خدمت</option>
                                            <option value="2" {{ $resume->persion->military == 2 && 'selected' }}>
                                                معافیت دائم</option>
                                            <option value="3" {{ $resume->persion->military == 3 && 'selected' }}
                                                selected>معافیت تحصیلی</option>
                                            <option value="4" {{ $resume->persion->military == 4 && 'selected' }}>در
                                                حال انجام</option>
                                            <option value="5" {{ $resume->persion->military == 5 && 'selected' }}>
                                                مشمول</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-5 d-flex flex-column justify-content-center">
                            <div class="card h-100 mb-3">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <div class="mb-2 w-75 mx-auto">
                                        <label for="site" class="form-label">وبسایت</label>
                                        <div class="input-group mb-3">
                                            <input type="url" class="form-control" name="site"
                                                placeholder="چیزی بنویسید ..." id="site"
                                                value="{{ $resume->callData->site }}">
                                            <span class="input-group-text"><i class='bx bx-globe'></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-2 w-75 mx-auto">
                                        <label for="phone" class="form-label">تلفن</label>
                                        <div class="input-group mb-3">
                                            <input type="tel" class="form-control" name="phone"
                                                placeholder="چیزی بنویسید ..." id="phone"
                                                value="{{ $resume->callData->phone }}">
                                            <span class="input-group-text"><i class='bx bx-phone'
                                                    style="transform: rotate(202deg)"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-2 w-75 mx-auto">
                                        <label for="email" class="form-label">ایمیل</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="چیزی بنویسید ..." id="email"
                                                value="{{ $resume->callData->email }}">
                                            <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-around">
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <label for="bio" class="form-label">درباره خودتان به صورت مختصر توضیح
                                        دهید</label>
                                    <textarea class="form-control" name="bio" id="bio" rows="3">{{ $resume->persion->info }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <label for="advantages" class="form-label">مزایای همکاری با شما ( به صورت خط به خط
                                        بنویسید )</label>
                                    <textarea class="form-control" name="advantages" id="advantages" rows="3">{{ $resume->persion->confrontation }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="mb-3 d-flex justify-content-around">
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-label">سوابق تحصیلی</label>
                                    <div class="mb-3 position-relative py-3" id="educationBox">

                                        <button type="button"
                                            class="btn-outline-success p-2 rounded position-absolute left-0"
                                            id="insertEdu" style="top: -8px; left:8px;"><i
                                                class="bx bx-plus-medical"></i></button>

                                        @foreach ($resume->education as $edu)
                                            <div class="border rounded p-3 mb-3 educationRoad position-relative">

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label for="name-" class="form-label">نام دوره</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="چیزی بنویسید..." value="{{ $edu->name }}" />
                                                </div>

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label class="form-label" for="year">سال</label>
                                                    <div class="d-flex justify-content-around date">
                                                        <input type="text" class="form-control w-25" id="from"
                                                            placeholder="چیزی بنویسید..." value="{{ $edu->from }}" />
                                                        <p>تا</p>
                                                        <input type="text" class="form-control w-25" id="to"
                                                            placeholder="چیزی بنویسید..." value="{{ $edu->to }}" />
                                                    </div>
                                                </div>

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label for="map-" class="form-label">مکان</label>
                                                    <input type="text" class="form-control" id="map"
                                                        placeholder="چیزی بنویسید..." value="{{ $edu->map }}" />
                                                </div>

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label for="desc" class="form-label">توضیحات کوتاه</label>
                                                    <textarea class="form-control" id="desc" rows="3">{{ $edu->desc }}</textarea>
                                                </div>
                                                <button type="button"
                                                    class="btn-outline-danger p-2 rounded position-absolute delEdu"
                                                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-label">مهارت ها</label>
                                    <div class="mb-3 position-relative py-3" id="skillBox">

                                        <button type="button"
                                            class="btn-outline-success p-2 rounded position-absolute left-0"
                                            style="top: -8px; left:8px;" id="insertSkill"><i
                                                class="bx bx-plus-medical"></i></button>

                                        @foreach ($resume->skill as $skill)
                                            <div class="border rounded p-3 mb-3 d-flex justify-content-between skillRoad">

                                                <div class="mb-2 col-7 mx-auto">
                                                    <label for="name-" class="form-label">عنوان مهارت</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="چیزی بنویسید..." value="{{ $skill->name }}" />
                                                </div>

                                                <div class="mb-2 col-3 mx-auto">
                                                    <label for="level-" class="form-label">سطح (از 100)</label>
                                                    <input type="number" min="5" max="100"
                                                        class="form-control" id="level" placeholder="چیزی بنویسید..."
                                                        value="{{ $skill->level }}" />
                                                </div>

                                                <button type="button"
                                                    class="btn-outline-danger p-2 rounded position-absolute delSkill"
                                                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="my-5 d-flex justify-content-around">
                        <div class="col-5">
                            <div class="card w-100">
                                <div class="card-body">
                                    <label class="form-label">تجربیات</label>
                                    <div class="mb-3 position-relative py-3" id="experiencesBox">

                                        <button type="button"
                                            class="btn-outline-success p-2 rounded position-absolute left-0"
                                            id="insertExperiences" style="top: -8px; left:8px;"><i
                                                class="bx bx-plus-medical"></i></button>

                                        @foreach ($resume->experience as $experience)
                                            <div class="border rounded p-3 mb-3 experiencesRoad position-relative">

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label for="name-" class="form-label">عنوان</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="چیزی بنویسید..." value="{{ $experience->name }}" />
                                                </div>

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label class="form-label" for="year">سال</label>
                                                    <div class="d-flex justify-content-around date">
                                                        <input type="text" class="form-control w-25" id="from"
                                                            placeholder="چیزی بنویسید..."
                                                            value="{{ $experience->from }}" />
                                                        <p>تا</p>
                                                        <input type="text" class="form-control w-25" id="to"
                                                            placeholder="چیزی بنویسید..."
                                                            value="{{ $experience->to }}" />
                                                    </div>
                                                </div>

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label for="map-" class="form-label">مکان / شرکت</label>
                                                    <input type="text" class="form-control" id="map"
                                                        placeholder="چیزی بنویسید..." value="{{ $experience->map }}" />
                                                </div>

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label for="desc" class="form-label">توضیحات کوتاه</label>
                                                    <textarea class="form-control" id="desc" rows="3">{{ $experience->desc }}</textarea>
                                                </div>
                                                <button type="button"
                                                    class="btn-outline-danger p-2 rounded position-absolute delExperiences"
                                                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-label">نمونه کار های شما</label>
                                    <div class="mb-3 position-relative py-3" id="portfolioBox">

                                        <button type="button"
                                            class="btn-outline-success p-2 rounded position-absolute left-0"
                                            style="top: -8px; left:8px;" id="insertPortfolio"><i
                                                class="bx bx-plus-medical"></i></button>

                                        @foreach ($resume->portfolio as $portfolio)
                                            <div class="border rounded p-3 mb-3 portfolioRoad position-relative">

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label class="form-label" for="ep">تصویر</label>
                                                    <div id="ePosterBox" class="ePosterBox"
                                                        style="width: 100%; height: 150px; background-image: url({{ !empty($portfolio->image) ? env('i_Resume_Files_URL') . '/images/portfolio/' . $portfolio->image : env('APP_URL') . '/assets/sneat/assets/img/nature.jpg' }})">
                                                        <input type="file" class="form-control ePoster"
                                                            style="width: 100%; height: 150px; opacity: 0;"
                                                            accept="image/*" />
                                                    </div>
                                                </div>

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label for="name-" class="form-label">عنوان</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $portfolio->title }}" id="name"
                                                        placeholder="چیزی بنویسید..." />
                                                </div>

                                                <div class="mb-2 w-75 mx-auto">
                                                    <label for="url-" class="form-label">آدرس مشاهده یا اطلاعا بیشتر
                                                        کار</label>
                                                    <input type="url" class="form-control" id="url"
                                                        placeholder="چیزی بنویسید..." value="{{ $portfolio->url }}" />
                                                </div>

                                                <button type="button"
                                                    class="btn-outline-danger p-2 rounded position-absolute delPortfolio "
                                                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between p-2" id="callData" dir="rtl">

                                <div class="mb-1 w-25 me-2">
                                    <label for="rubika" class="form-label">روبیکا</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="rubika"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->rubika }}>
                                        <span class="input-group-text"><i class="xf xf-robika fs-2"></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="bale" class="form-label">بله</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="bale"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->bale }}>
                                        <span class="input-group-text"><i class="xf xf-bale fs-2"></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="youtube" class="form-label">ایتا</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="youtube"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->eitaa }}>
                                        <span class="input-group-text"><i class="xf xf-eitaa fs-2"></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="aparat" class="form-label">آپارات</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="aparat"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->aparat }}>
                                        <span class="input-group-text"><i class='xf xf-aparat fs-2'></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="gap" class="form-label">گپ</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="gap"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->gap }}>
                                        <span class="input-group-text"><i class='xf xf-gap fs-2'></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="telegram" class="form-label">تلگرام</label>
                                    <div class="input-group mb-3">
                                        <input type="tel" class="form-control" name="telegram"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->telegram }}>
                                        <span class="input-group-text"><i class='bx bxl-telegram'></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="facebook" class="form-label">فیسبوک</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="facebook"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->facebook }}>
                                        <span class="input-group-text"><i class='bx bxl-facebook'></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="twitter" class="form-label">توئیتر ( ایکس )</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="twitter"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->twitter }}>
                                        <span class="input-group-text"><i class='bx bxl-twitter'></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="instagram" class="form-label">اینستاگرام</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="instagram"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->inestagram }}>
                                        <span class="input-group-text"><i class='bx bxl-instagram'></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="youtube" class="form-label">یوتیوب</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="youtube"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->youtube }}>
                                        <span class="input-group-text"><i class='bx bxl-youtube'></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="github" class="form-label">گیتهاب</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="github"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->github }}>
                                        <span class="input-group-text"><i class='bx bxl-github'></i></span>
                                    </div>
                                </div>

                                <div class="mb-1 w-25 me-2">
                                    <label for="linkedin" class="form-label">لینکدین</label>
                                    <div class="input-group mb-3">
                                        <input type="url" class="form-control" name="linkedin"
                                            placeholder="چیزی بنویسید ..." value={{ $resume->callData->linkedin }}>
                                        <span class="input-group-text"><i class='bx bxl-linkedin'></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-5 d-flex justify-content-between p-3" dir="rtl">
                        <div class="col-5">
                            <div class="card" style="height: 500px;">
                                <div class="card-body">
                                    <label class="form-label">مهارت گرامری</label>
                                    <div class="mb-3 position-relative py-3" id="langBox">

                                        <button type="button"
                                            class="btn-outline-success p-2 rounded position-absolute left-0"
                                            id="insertLang" style="top: -8px; left:8px;"><i
                                                class="bx bx-plus-medical"></i></button>

                                        @foreach ($resume->grammer as $lang)
                                            <div class="border rounded p-3 mb-3 langRoad position-relative d-flex">

                                                <div class="mb-2 col-6 mx-auto">
                                                    <label for="lang-" class="form-label">زبان</label>
                                                    <select id="lang" class="form-select">
                                                        <option disabled="true" value="0">-- نام زبان را انتخاب کنید
                                                            --</option>
                                                        <option value="1"
                                                            {{ $lang->lang['orginal'] == 1 ? 'selected' : '' }}>آذری
                                                        </option>
                                                        <option value="2"
                                                            {{ $lang->lang['orginal'] == 2 ? 'selected' : '' }}>آلمانی
                                                        </option>
                                                        <option value="3"
                                                            {{ $lang->lang['orginal'] == 3 ? 'selected' : '' }}>ارمنی
                                                        </option>
                                                        <option value="4"
                                                            {{ $lang->lang['orginal'] == 4 ? 'selected' : '' }}>اسپانیایی
                                                        </option>
                                                        <option value="5"
                                                            {{ $lang->lang['orginal'] == 5 ? 'selected' : '' }}>انگلیسی
                                                        </option>
                                                        <option value="6"
                                                            {{ $lang->lang['orginal'] == 6 ? 'selected' : '' }}>ایتالیایی
                                                        </option>
                                                        <option value="7"
                                                            {{ $lang->lang['orginal'] == 7 ? 'selected' : '' }}>ترکی
                                                            استانبولی
                                                        </option>
                                                        <option value="8"
                                                            {{ $lang->lang['orginal'] == 8 ? 'selected' : '' }}>چینی
                                                        </option>
                                                        <option value="9"
                                                            {{ $lang->lang['orginal'] == 9 ? 'selected' : '' }}>روسی
                                                        </option>
                                                        <option value="10"
                                                            {{ $lang->lang['orginal'] == 10 ? 'selected' : '' }}>ژاپنی
                                                        </option>
                                                        <option value="11"
                                                            {{ $lang->lang['orginal'] == 11 ? 'selected' : '' }}>سوئدی
                                                        </option>
                                                        <option value="12"
                                                            {{ $lang->lang['orginal'] == 12 ? 'selected' : '' }}>عربی
                                                        </option>
                                                        <option value="13"
                                                            {{ $lang->lang['orginal'] == 13 ? 'selected' : '' }}>فارسی
                                                        </option>
                                                        <option value="14"
                                                            {{ $lang->lang['orginal'] == 14 ? 'selected' : '' }}>فرانسوی
                                                        </option>
                                                        <option value="15"
                                                            {{ $lang->lang['orginal'] == 15 ? 'selected' : '' }}>فنلاندی
                                                        </option>
                                                        <option value="16"
                                                            {{ $lang->lang['orginal'] == 16 ? 'selected' : '' }}>کردی
                                                        </option>
                                                        <option value="17"
                                                            {{ $lang->lang['orginal'] == 17 ? 'selected' : '' }}>کره‌ای
                                                            (هانگول)
                                                        </option>
                                                        <option value="18"
                                                            {{ $lang->lang['orginal'] == 18 ? 'selected' : '' }}>هلندی
                                                        </option>
                                                        <option value="19"
                                                            {{ $lang->lang['orginal'] == 19 ? 'selected' : '' }}>هندی
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="mb-2 col-4 mx-auto">
                                                    <label for="level-" class="form-label">سطح</label>
                                                    <select id="level" class="form-select">
                                                        <option disabled="true" value="0">-- سطح تسلط را انتخاب کنید
                                                            --</option>
                                                        <option value="1"
                                                            {{ $lang->level['orginal'] == 1 ? 'selected' : '' }}>مبتدی
                                                        </option>
                                                        <option value="2"
                                                            {{ $lang->level['orginal'] == 2 ? 'selected' : '' }}>متوسط
                                                        </option>
                                                        <option value="3"
                                                            {{ $lang->level['orginal'] == 3 ? 'selected' : '' }}>حرفه‌ای
                                                        </option>
                                                        <option value="4"
                                                            {{ $lang->level['orginal'] == 4 ? 'selected' : '' }}>زبان مادری
                                                        </option>
                                                    </select>
                                                </div>

                                                <button type="button"
                                                    class="btn-outline-danger p-2 rounded position-absolute delLang"
                                                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-5" id="mapBox">
                            <div class="card" style="height: 500px;">
                                <div class="card-body">
                                    <div class="md-3 w-75 mx-auto">
                                        <label for="address" class="form-label">آدرس محل کار</label>
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="address" id="address" rows="3">{{ $resume->persion->address }}</textarea>
                                            <span class="input-group-text"><i class='bx bx-map'></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 w-75 mx-auto">
                                        <label for="map-url" class="form-label">آدرس نقشه در <a href="https://balad.ir"
                                                target="_blank">مسیر یاب بلد</a></label>
                                        <div class="input-group mb-3">
                                            <input type="url" class="form-control" name="map" id="map-url-box"
                                                placeholder="چیزی بنویسید ..." value="{{ $resume->persion->map }}">
                                            <span class="input-group-text"><i class='bx bx-globe'></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 w-75 mx-auto">
                                        <iframe src="" frameborder="0" style="border:0;" id="map-frame"
                                            allowfullscreen="" aria-hidden="false" tabindex="0"
                                            class="w-100 mx-auto"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card mb-3 p-2">
                        <div class="car-body">
                            <div class="mb-2 col-7 mx-auto">
                                <label for="name-" class="form-label">نسخه وب</label>
                                <div class="d-flex row row-cols row-cols-md-2" id="webVerContainer">
                                    <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="webVer" id="webVer" value="1" {{$resume->web == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="webVer">
                                          <img src="{{asset('assets/template/demo/web/1.png')}}" alt="" style="width: 200px; height:200px;">
                                        </label>
                                      </div>
                                      <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="webVer" id="webVer" value="2" {{$resume->web == 2 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="webVer">
                                          <img src="{{asset('assets/template/demo/web/2.png')}}" alt="" style="width: 200px; height:200px;">
                                        </label>
                                      </div>
                                      <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="webVer" id="webVer" value="3" {{$resume->web == 3 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="webVer">
                                          <img src="{{asset('assets/template/demo/web/3.png')}}" alt="" style="width: 200px; height:200px;">
                                        </label>
                                      </div>
                                      <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="webVer" id="webVer" value="4" {{$resume->web == 4 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="webVer">
                                          <img src="{{asset('assets/template/demo/web/4.png')}}" alt="" style="width: 200px; height:200px;">
                                        </label>
                                      </div>
                                </div>
                            </div>

                            <div class="mb-2 col-7 mx-auto">
                                <label for="name-" class="form-label">نسخه چاپی</label>
                                <div class="d-flex row row-cols row-cols-md-2" id="printVerContainer">
                                    <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="printVer" id="printVer" value="1" {{$resume->print == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="printVer">
                                          <img src="{{asset('assets/template/demo/print/1.jpg')}}" alt="" style="width: 200px; height:200px;">
                                        </label>
                                      </div>
                                      <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="printVer" id="printVer" value="2" {{$resume->print == 2 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="printVer">
                                          <img src="{{asset('assets/template/demo/print/2.jpg')}}" alt="" style="width: 200px; height:200px;">
                                        </label>
                                      </div>
                                      <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="printVer" id="printVer" value="4" {{$resume->print == 4 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="printVer">
                                          <img src="{{asset('assets/template/demo/print/4.jpg')}}" alt="" style="width: 200px; height:200px;">
                                        </label>
                                      </div>
                                      <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="printVer" id="printVer" value="6" {{$resume->print == 6 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="printVer">
                                          <img src="{{asset('assets/template/demo/print/6.jpg')}}" alt="" style="width: 200px; height:200px;">
                                        </label>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-50 mx-auto" type="submit">ثبت تغییرات</button>
                    </div>
                </form>
            </div>
            <!-- /Register -->
        </div>
    </div>
    </div>


    <PageSources>
        <div class="education">
            <div class="border rounded p-3 mb-3 educationRoad position-relative">

                <div class="mb-2 w-75 mx-auto">
                    <label for="name-" class="form-label">نام دوره</label>
                    <input type="text" class="form-control" id="name" placeholder="چیزی بنویسید..." />
                </div>

                <div class="mb-2 w-75 mx-auto">
                    <label class="form-label" for="year">سال</label>
                    <div class="d-flex justify-content-around date">
                        <input type="text" class="form-control w-25" id="from" placeholder="چیزی بنویسید..." />
                        <p>تا</p>
                        <input type="text" class="form-control w-25" id="to" placeholder="چیزی بنویسید..." />
                    </div>
                </div>

                <div class="mb-2 w-75 mx-auto">
                    <label for="map-" class="form-label">مکان</label>
                    <input type="text" class="form-control" id="map" placeholder="چیزی بنویسید..." />
                </div>

                <div class="mb-2 w-75 mx-auto">
                    <label for="desc" class="form-label">توضیحات کوتاه</label>
                    <textarea class="form-control" id="desc" rows="3"></textarea>
                </div>
                <button type="button" class="btn-outline-danger p-2 rounded position-absolute delEdu"
                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
            </div>
        </div>

        <div class="skill">
            <div class="border rounded p-3 mb-3 d-flex justify-content-between skillRoad">

                <div class="mb-2 col-7 mx-auto">
                    <label for="name-" class="form-label">عنوان مهارت</label>
                    <input type="text" class="form-control" id="name" placeholder="چیزی بنویسید..." />
                </div>

                <div class="mb-2 col-3 mx-auto">
                    <label for="level-" class="form-label">سطح (از 100)</label>
                    <input type="number" min="5" max="100" class="form-control" id="level"
                        placeholder="چیزی بنویسید..." />
                </div>

                <button type="button" class="btn-outline-danger p-2 rounded position-absolute delSkill"
                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
            </div>
        </div>

        <div class="experiences">
            <div class="border rounded p-3 mb-3 experiencesRoad position-relative">

                <div class="mb-2 w-75 mx-auto">
                    <label for="name-" class="form-label">عنوان</label>
                    <input type="text" class="form-control" id="name" placeholder="چیزی بنویسید..." />
                </div>

                <div class="mb-2 w-75 mx-auto">
                    <label class="form-label" for="year">سال</label>
                    <div class="d-flex justify-content-around date">
                        <input type="text" class="form-control w-25" id="from" placeholder="چیزی بنویسید..." />
                        <p>تا</p>
                        <input type="text" class="form-control w-25" id="to" placeholder="چیزی بنویسید..." />
                    </div>
                </div>

                <div class="mb-2 w-75 mx-auto">
                    <label for="map-" class="form-label">مکان / شرکت</label>
                    <input type="text" class="form-control" id="map" placeholder="چیزی بنویسید..." />
                </div>

                <div class="mb-2 w-75 mx-auto">
                    <label for="desc" class="form-label">توضیحات کوتاه</label>
                    <textarea class="form-control" id="desc" rows="3"></textarea>
                </div>
                <button type="button" class="btn-outline-danger p-2 rounded position-absolute delExperiences"
                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
            </div>
        </div>

        <div class="portfolio">
            <div class="border rounded p-3 mb-3 portfolioRoad position-relative">

                <div class="mb-2 w-75 mx-auto">
                    <label class="form-label" for="ep">تصویر</label>
                    <div id="ePosterBox" class="ePosterBox" style="width: 100%; height: 150px;">
                        <input type="file" class="form-control ePoster"
                            style="width: 100%; height: 150px; opacity: 0;" accept="image/*" />
                    </div>
                </div>

                <div class="mb-2 w-75 mx-auto">
                    <label for="name-" class="form-label">عنوان</label>
                    <input type="text" class="form-control" id="name" placeholder="چیزی بنویسید..." />
                </div>

                <div class="mb-2 w-75 mx-auto">
                    <label for="url-" class="form-label">آدرس مشاهده یا اطلاعا بیشتر
                        کار</label>
                    <input type="url" class="form-control" id="url" placeholder="چیزی بنویسید..." />
                </div>

                <button type="button" class="btn-outline-danger p-2 rounded position-absolute delPortfolio "
                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
            </div>
        </div>

        <div class="lang">


            <div class="border rounded p-3 mb-3 langRoad position-relative d-flex">

                <div class="mb-2 col-6 mx-auto">
                    <label for="lang-" class="form-label">زبان</label>
                    <select id="lang" class="form-select">
                        <option disabled="true" value="0">-- نام زبان را انتخاب کنید --</option>
                        <option value="1">آذری</option>
                        <option value="2">آلمانی</option>
                        <option value="3">ارمنی</option>
                        <option value="4">اسپانیایی</option>
                        <option value="5">انگلیسی</option>
                        <option value="6">ایتالیایی</option>
                        <option value="7">ترکی استانبولی</option>
                        <option value="8">چینی</option>
                        <option value="9">روسی</option>
                        <option value="10">ژاپنی</option>
                        <option value="11">سوئدی</option>
                        <option value="12">عربی</option>
                        <option value="13">فارسی</option>
                        <option value="14">فرانسوی</option>
                        <option value="15">فنلاندی</option>
                        <option value="16">کردی</option>
                        <option value="17">کره‌ای (هانگول)</option>
                        <option value="18">هلندی</option>
                        <option value="19">هندی</option>
                    </select>
                </div>

                <div class="mb-2 col-4 mx-auto">
                    <label for="level-" class="form-label">سطح</label>
                    <select id="level" class="form-select">
                        <option disabled="true" value="0">-- سطح تسلط را انتخاب کنید --</option>
                        <option value="1">مبتدی</option>
                        <option value="2">متوسط</option>
                        <option value="3">حرفه‌ای</option>
                        <option value="4">زبان مادری</option>
                    </select>
                </div>

                <button type="button" class="btn-outline-danger p-2 rounded position-absolute delLang"
                    style="top: -8px; right:8px;"><i class="bx bx-trash"></i></button>
            </div>

        </div>
    </PageSources>


    <div id="date-bx"></div>
@endsection
@section('script')

    <script>
            $('#educationBox, #skillBox').css('height', ($('PageSources > .education').height() + 20) + 'px');
            $('#portfolioBox, #experiencesBox').css('height', ($('PageSources > .portfolio').height() + 20) + 'px');
            $('PageSources, #map-frame').hide();


            $('.educationRoad .delEdu, .skillRoad .delSkill, .experiencesRoad .delExperiences, .portfolioRoad .delPortfolio, .langRoad .delLang')
                .click(function() {
                    $(this).parent().remove();
                });

            $('.ePoster').on('change', function() {
                var target = $(this).parent().parent().find('.ePosterBox');
                var reader = new FileReader();
                reader.onload = function() {
                    target.css('background-image', "url(" +
                        reader.result + ")");
                }
                reader.readAsDataURL(event.target.files[0]);
            });

            const requireField = [
                'persionName',
                'persionSkill',
                'persionBirth',
                'MilitaryService',
                'email',
                'phone',
                'bio',
                'name-',
                'year',
                'map-',
                'level-',
                'url-',
                'lang-',
                'webVer',
                'printVer'
            ];
            $('label').each(function(index, element) {
                requireField.forEach(element => {
                    if ($(this).attr('for') == element) {
                        $(this).append("<span class='require'>*</span>");
                        $(this).parent().find('input, textarea').attr('required', '');
                    }
                });
            });

            $('#profileBox').on('change', (event) => {
                var reader = new FileReader();
                reader.onload = function() {
                    var fileUploadButton = document.querySelector('#profileBox').style
                        .backgroundImage = "url(" +
                        reader.result + ")";
                }
                reader.readAsDataURL(event.target.files[0]);
            });

            $('#posterBox').on('change', (event) => {
                var reader = new FileReader();
                reader.onload = function() {
                    var fileUploadButton = document.querySelector('#posterBox').style
                        .backgroundImage = "url(" +
                        reader.result + ")";
                }
                reader.readAsDataURL(event.target.files[0]);
            });

            $('#educationBox #insertEdu').click(function() {

                $('#educationBox').append($('PageSources > .education').html());
                $('.educationRoad .delEdu').click(function() {
                    $(this).parent().remove();
                });
            });

            $('#skillBox #insertSkill').click(function() {
                $('#skillBox').append($('PageSources > .skill').html());
                $('.skillRoad .delSkill').click(function() {
                    $(this).parent().remove();
                });
            });

            $('#experiencesBox #insertExperiences').click(function() {
                $('#experiencesBox').append($('PageSources > .experiences').html());
                $('.experiencesRoad .delExperiences').click(function() {
                    $(this).parent().remove();
                });
            });

            $('#portfolioBox #insertPortfolio').click(function() {
                $('#portfolioBox').append($('PageSources > .portfolio').html());
                $('.portfolioRoad .delPortfolio').click(function() {
                    $(this).parent().remove();
                });
                $('.ePoster').on('change', function() {
                    var target = $(this).parent().parent().find('.ePosterBox');
                    var reader = new FileReader();
                    reader.onload = function() {
                        target.css('background-image', "url(" +
                            reader.result + ")");
                    }
                    reader.readAsDataURL(event.target.files[0]);
                });
            });

            $('#langBox #insertLang').click(function() {
                $('#langBox').append($('PageSources > .lang').html());
                $('.langRoad .delLang').click(function() {
                    $(this).parent().remove();
                });
            });

            $('#map').change(function(event) {
                if ($(this).val().includes('https://balad.ir/p/')) {
                    $('#map-frame').attr('src',
                        `https://balad.ir/embed?p=${$(this).val().split('/p/')[1]}`);
                    $('#map-frame').show();
                } else {
                    $('#map-frame').hide();
                }
            });

            $('#formEdit').submit(async function(event) {
                event.preventDefault();

                $('#formEdit').hide();
                $('#loading').removeClass('hidden');

                let education = [];
                await $('#educationBox .educationRoad').each(function(index, element) {
                    education.push({
                        name: $(element).find('#name').val(),
                        from: $(element).find('#from').val(),
                        to: $(element).find('#to').val(),
                        map: $(element).find('#map').val(),
                        desc: $(element).find('#desc').val(),
                    });
                });

                let skill = [];
                await $('#skillBox .skillRoad').each(function(index, element) {
                    skill.push({
                        name: $(element).find('#name').val(),
                        level: $(element).find('#level').val(),
                    });
                });

                let experiences = [];
                await $('#experiencesBox .experiencesRoad').each(function(index, element) {
                    experiences.push({
                        name: $(element).find('#name').val(),
                        map: $(element).find('#map').val(),
                        desc: $(element).find('#desc').val(),
                        from: $(element).find('#from').val(),
                        to: $(element).find('#to').val()
                    });
                });

                let lang = [];
                await $('#langBox .langRoad').each(function(index, element) {
                    lang.push({
                        lang: $(element).find('#lang').val(),
                        level: $(element).find('#level').val(),
                    });
                });

                let callData = {};
                await $('#callData input').each(function(index, element) {
                    callData[$(element).attr('name')] = $(element).val();
                });

                var formData = new FormData();
                formData.append('_token', $("input[name='_token']").val());
                formData.append('id', $("input[name='_id']").val());
                $('#poster')[0].files.length > 0 && formData.append('poster', $('#poster')[0].files[0]);
                formData.append('name', $('#persionName').val());
                formData.append('expertise', $('#persionSkill').val());
                $('#profile')[0].files.length > 0 && formData.append('profile', $('#profile')[0].files[
                    0]);
                formData.append('birth', $('#persionBirth').val());
                formData.append('soldier', $('#MilitaryService').val());
                formData.append('site', $('#site').val());
                formData.append('name', $('#persionName').val());
                formData.append('phone', $('#phone').val());
                formData.append('email', $('#email').val());
                formData.append('info', $('#bio').val());
                formData.append('confrontation', $('#advantages').val());
                formData.append('education', JSON.stringify(education));
                formData.append('skill', JSON.stringify(skill));
                formData.append('experience', JSON.stringify(experiences));
                formData.append('grammer', JSON.stringify(lang));
                formData.append('callData', JSON.stringify(callData));
                formData.append('map', $('#address').val());
                formData.append('print', $('input[name=printVer]:checked').val());
                formData.append('web', $('input[name=webVer]:checked').val());
                $('#map-url-box').val() && formData.append('mapUrl', $('#map-url-box').val());

                await $.post({
                    url: "http://localhost:8000/home/edit",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle successful response
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });

                await $('#portfolioBox .portfolioRoad').each(async function(index, element) {
                    let temp = new FormData();
                    temp.append('_token', $("input[name='_token']").val());
                    temp.append('id', $("input[name='_id']").val());
                    $(element).find('.ePoster').val() && temp.append('poster', $(element)
                        .find('.ePoster')[0].files[0]);
                    temp.append('name', $(element).find('#name').val());
                    temp.append('url', $(element).find('#url').val());
                    await $.post({
                        url: "http://localhost:8000/home/insert/portfolio",
                        data: temp,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                let okData = new FormData();
                okData.append('_token', $("input[name='_token']").val());
                okData.append('id', $("input[name='_id']").val());
                await $.post({
                    url: "http://localhost:8000/home/ok/portfolio",
                    data: okData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                location.reload();

            });
    </script>
@endsection
