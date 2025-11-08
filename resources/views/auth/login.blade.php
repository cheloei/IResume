@extends('layouts.baseHtml')
@section('title', 'ورود')
@section('head')
    <link rel="stylesheet" href="{{asset('assets/laravelDefault/css/main/form.css')}}">
@endsection

@section('content')
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-6 formCard">
                <div class="form-container">
                    <div class="form-icon"><i class="fa fa-user"></i></div>
                    <h3 class="title">ورود به حساب کاربری</h3>
                    <h3 style="font-size: 18px; " class="text-center">حساب کاربری ندارید ؟ <a style="text-decoration: none; color: #ac40ab" href="{{route('register')}}">عضویت</a></h3>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="ایمیل شما ؟" name="email" value="{{ old('email')}}">
                        </div>
                        <div class="form-group">
                            <label>رمز عبور</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="رمز عبور ؟" name="password">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4 text-right">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        منو یادت باشه
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">ورود</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
