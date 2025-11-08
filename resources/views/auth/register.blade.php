@extends('layouts.baseHtml')
@section('title', 'عضویت')
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
                    <h3 class="title">عضویت در آی رزومه</h3>
                    <h3 style="font-size: 18px; " class="text-center">حساب کاربری دارید ؟ <a style="text-decoration: none; color: #ac40ab" href="{{route('login')}}">وارد شوید</a></h3>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>نام</label>
                            <input class="form-control text-right @error('name') is-invalid @enderror" type="text" placeholder="نام شریف شما ؟" name="name" value="{{ old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="ایمیل شما ؟" name="email" value="{{ old('email')}}">
                        </div>
                        <div class="form-group">
                            <label>رمز عبور</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="رمز عبور خود را تعیین کنید" name="password">
                        </div>
                        <div class="form-group">
                            <label>تکرار رمز عبور</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" placeholder="رمز عبور خود را تکرار کنید" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-default">عضویت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
