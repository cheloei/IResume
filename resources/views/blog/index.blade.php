@extends('layouts.baseBlog')
@section('title')
    {{ request('word') ? 'جستجوی ' . request('word') : 'صفحه اصلی' }}
    @endsection
@section('page')
    <div class="row align-items-center align-content-center">
        <div class="col-md-12 mt-4 mt-md-0">
            <h3 class="text-muted py-4 text-center">خوش آمدید به وبلاگ
                {{ !empty($resume->persion->name) ? $resume->persion->name : '" نام شما "' }}</h3>
            <div class="text-center py-4 ">
                @foreach ($categories as $cate)
                    <a class='btn btn-outline-secondary m-1'
                        href='{{ env('APP_URL') . '/blog/' . $resume->id . '/category/' . $cate->id }}'>{{ $cate->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row align-items-center align-content-center">
        <div class="row row-cols-1 row-cols-md-3 g-4" dir="rtl">
            @if ($posts)
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card h-100">
                            <img height="250px" src="{{ env('i_Resume_Files_URL') . '/images/blog/post/' . $post->image }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><a href="post.php">{{ $post->title }}</a></h5>
                                <hr>
                                <p class="card-text">{!! $post->body > 200 ? substr($post->body, 0, 200) . '...' : $post->body !!}</p>
                                <a href="{{ '/blog/' . $resume->id . '/' . $post->id }}" target="_blank" type="button"
                                    class="btn btn-outline-secondary btn-block">ادامه مطلب</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-crate"> تاریخ انتشار : {{ $post->ctime }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="alert alert-danger text-center">هیچ پستی در وبلاگ برای نمایش وجود ندارد</p>
            @endif
        </div>
    </div>
@endsection
