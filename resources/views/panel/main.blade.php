@extends('panel.baseHtml')
@section('title', 'داشبورد')
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')
    @if (Session::exists('success'))
        <script>
            swal('موفق', 'رزومه مورد نظر با موفقیت ساخته شد', 'success', {
                button: true,
                button: 'ممنون :)',
                timer: 5000
            });
        </script>
    @elseif (Session::exists('error'))
        <script>
            swal('خطا', 'متاسفانه ساخت رزومه با خطا روبرو شد', 'error', {
                button: true,
                button: 'فهمیدم',
                timer: 5000
            });
        </script>
    @endif
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <div class="row container mx-auto my-5 justify-content-center" dir="rtl">
                @foreach ($resumes as $resume)
                    <div class="col-lg-3 col-12 mb-2" style="height: fit-content;">
                        <div class="card flow-less">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-semibold d-block mb-1 w-75">{{ $resume->name }}</span>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a href="/{{ $resume->id }}" target="_blank"
                                                    class="dropdown-item d-flex justify-content-between"><i
                                                        class='bx bxs-show'></i> مشاهده رزومه</a>

                                                <a href="home/edit/{{ $resume->id }}"
                                                    class="dropdown-item d-flex justify-content-between"><i
                                                        class='bx bx-pencil'></i> ویرایش</a>

                                                <a class="dropdown-item d-flex justify-content-between"
                                                    href="{{ '/home/' . $resume->id . '/messages' }}"><i
                                                        class='bx bx-message-rounded-detail'></i> پیام های دریافتی</a>

                                                <a class="dropdown-item d-flex justify-content-between"
                                                    href="{{ env('APP_URL') . '/blog/admin/' . $resume->id }}"><i
                                                        class='bx bxl-blogger'></i> مدیریت وبلاگ</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <img src="{{ !empty($resume->poster) ? env('i_Resume_Files_URL') . '/images/poster/' . $resume->poster : env('APP_URL') . '/assets/sneat/assets/img/nature.jpg' }}"
                                            class="rounded mx-auto d-block w-100 my-3"
                                            style="height: 
                                    80px; border-radius: 8px;"
                                            alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
        <a data-bs-toggle="modal" data-bs-target="#CreateModal" target="_blank" class="btn btn-danger btn-buy-now"><i
                class='bx bx-plus-medical'></i></a>
    </div>

    <div class="modal fade" id="CreateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between flex-column-reverse">
                    <h1 class="modal-title fs-5" id="CreateModalLabel">ساخت رزومه جدید</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" dir="rtl">
                    <form method="POST" action="{{ route('createResume') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">نام رزومه</label>
                            <div class="input-group input-group-merge" dir="ltr">
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="چیزی بنویسید ..." dir="rtl" name="name" required />
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class='bx bx-file-blank'></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">بساز</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
