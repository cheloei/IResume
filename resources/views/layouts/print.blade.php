@extends('layouts.baseHtml')
@section('title')
    چاپ رزومه {{$resume->persion->name}}
@endsection
@section('bootstrap-less', true)
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/xfont.css') }}">
@endsection
@section('content')
    <div class="p-3 bg-light border-bottom shadow-sm d-flex justify-content-between" dir="rtl">
        <h3 class="lead text-secondary">چاپ رزومه</h3>
        <button class="btn btn-outline-secondary" id="download"><i class="bi bi-printer"></i></button>
    </div>
    <div class="py-4">
        @include('template.print.orbit')
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        $('#download').click(function() {
            $('#print-section').css('display', 'block');
            const element = document.querySelector('#print-section');
            var opt = {
                margin: .12,
                filename: 'myfile.pdf',
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                }
            };
            html2pdf().from(element).set(opt).save();
        });
    </script>
@endsection
