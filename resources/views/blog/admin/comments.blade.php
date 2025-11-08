@extends('layouts.baseBlog')
@section('title', 'مدیریت نظرات')
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
    <div class="content flex-column-fluid py-3" id="kt_content">
        <div class="card card-custom card-stretch" id="kt_page_stretched_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">کامنت های وبلاگ را مدیریت کنید</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-checkable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>پست</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>متن نظر</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>
                                        <a href="{{'/blog/' . $resume->id . '/' . $comment->post->id}}" target="_blank" style="text-decoration: none;">{{$comment->post->title}}</a>
                                    </td>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{{$comment->user->email}}</td>
                                    <td>{!! $comment->body !!}</td>
                                    <td>{{$comment->ctime}}</td>
                                    <td>
                                        <a href="{{ route('admin') . '/statusComment/' . $resume->id . '/' . $comment->id }}" class="btn {{$comment->status == 0 ? 'btn-success' : 'btn-danger'}}">{{$comment->status == 0 ? 'تایید نظر' : 'رد نظر'}}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin') . '/deleteComment/' . $resume->id . '/' . $comment->id }}" class="btn btn-danger">حذف</a>
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
