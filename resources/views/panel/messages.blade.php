@extends('panel.baseHtml')
@section('title', 'پیام های دریافتی')
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style>
            .swal-text{
                text-align: right;
            }
        </style>
@endsection
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <div class="row container mx-auto my-5 justify-content-center" dir="rtl" id="messages">
                @foreach ($resume->messages as $msg)
                    <div class="col-lg-3 col-12 mb-2" style="height: fit-content;">
                        <div class="card flow-less" name="{{ $msg->name }}" email="{{ $msg->email }}"
                            subject="{{ $msg->subject }}" message="{{ $msg->message }}">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="d-flex justify-content-between">
                                        <span
                                            class="fw-semibold d-flex flex-column justify-content-center mb-1 w-100  text-center ">{{ $msg->subject }}</span>
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#messages .card').click(function() {
                swal("اطلاعات پیام", ` ارسال کننده : ${$(this).attr('name')} \n ایمیل : ${$(this).attr('email')} \n عنوان : ${$(this).attr('subject')} \n متن : \n ${$(this).attr('message')}`, 'info', {
                    button: true,
                    button: 'ممنون :)'
                });
            });
        });
    </script>
@endsection
