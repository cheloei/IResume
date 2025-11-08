@extends('layouts.baseBlog')
@section('title')
    {{$post->title}}
@endsection
@section('head')
    <style>
        textarea {
            min-height: 150px !important;
            max-height: 200px !important;
        }
    </style>
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
    <section class="home py-5" id="home">
        <div class="container-lg">
            <div class="row align-items-center align-content-center">
                <div class="row row-cols-12 row-cols-md-12 g-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center text-primary">{{ $post->title }}</h5>
                                <hr>
                                <p class="card-text">{!! $post->body !!}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-crate"> تاریخ انتشار :
                                    {{ $post->ctime }} </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="container mt-5 py-4">
        <div class="alert alert-success text-center">بخش نظرات</div>
        <div class="jumbotron">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">

                    @foreach ($comments as $comment)
                        <div class="card p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user d-flex flex-row align-items-center"> <img
                                        src="{{ asset('assets/blog/Theme/img/user.png') }}" width="30"
                                        class="user-img rounded-circle mr-2">
                                    <span>
                                        <small>کاربر</small>
                                        <small class="font-weight-bold text-primary.">{{ $comment->user->name }}</small>
                                        <small>گفت :</small>
                                    </span>
                                </div>
                                <small>{{ $comment->ctime }}</small>
                            </div>
                            <span>
                                <small class="font-weight-bold">{!! $comment->body !!}</small>
                            </span>

                        </div>

                        @if ($resume->blogComments()->where('replay', $comment->id)->count() > 0)
                            @foreach ($resume->blogComments->where('replay', $comment->id) as $rc)
                                <div class="card p-4 bg-secondary">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="user d-flex flex-row align-items-center"><img
                                                src="{{ asset('assets/blog/Theme/img/admin.png') }}" width="30"
                                                class="user-img rounded-circle mr-2">
                                            <span>
                                                <small class="text-light">ادمین</small>
                                                <small class="font-weight-bold text-info">سایت</small>
                                                <small class="text-light">پاسخ داد :</small>
                                            </span>
                                        </div>
                                        <small class="text-light">{{ $rc->ctime }}</small>
                                    </div>
                                    <span>
                                        <small class="font-weight-bold text-light">{!! $rc->bod !!}</small>
                                    </span>

                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <form action="{{ route('insertComment') }}" method="post">
                        @csrf
                        <input type="hidden" name="resume" value="{{ $resume->id }}">
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <div class="form-group">
                            <label for="comment">متن نظر:</label>
                            <textarea name="body" id="body" class="form-control" rows="5" id="comment"></textarea>
                        </div>
                        <button type="submit" name="sendComment" class="btn btn-primary btn-block mt-3">ارسال نظر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
