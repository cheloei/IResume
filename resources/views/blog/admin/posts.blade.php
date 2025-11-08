@extends('layouts.baseBlog')
@section('title', 'مدیریت پست ها')
@section('dash', true)
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('page')
    @if (Session::exists('success'))
        <script>
            swal('موفق', 'عملیات با موفقیت انجام شد', 'success', {
                button: true,
                button: 'ممنون :)',
                timer: 5000
            });
        </script>
    @elseif (Session::exists('error'))
        <script>
            swal('خطا', 'متاسفانه مشکلی پیش آمده', 'error', {
                button: true,
                button: 'فهمیدم',
                timer: 5000
            });
        </script>
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card card-custom card-stretch" id="kt_page_stretched_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">پست های وبلاگ را مدیریت کنید</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-checkable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان پست</th>
                                <th>دسته بندی</th>
                                <th>تصویر</th>
                                <th>تاریخ درج</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->tcategory }}</td>
                                    <td><img width="160px" height="90px"
                                            src="{{ env('i_Resume_Files_URL') . '/images/blog/post/' . $post->image }}" alt="">
                                    </td>
                                    <td>{{ $post->ctime }}</td>
                                    <td>
                                        <a href="{{ route('admin') . '/EditPost/' . $resume->id . '/' . $post->id }}" class="btn btn-success">ویرایش</a>
                                        <a href="{{ route('admin') . '/deletePost/' . $resume->id . '/' . $post->id }}"
                                            class="btn btn-danger">حذف</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
