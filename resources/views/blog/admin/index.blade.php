@extends('layouts.baseBlog')
@section('title', 'افزودن پست جدید')
@section('dash', true)
@section('head')
    <style>
        textarea {
            min-height: 150px !important;
            max-height: 200px !important;
        }
    </style>
@endsection
@section('page')
    <div class="content flex-column-fluid my-3" id="kt_content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            انتشار پست در وبلاگ
                        </h3>
                    </div>
                    <form action="{{route('insertPost')}}" method="post" enctype="multipart/form-data" class="form">
                        @csrf
                        <input type="hidden" name="resume" value="{{$resume->id}}">
                        <div class="card-body">
                            <div class="form-group form-group-last">
                            </div>
                            <div class="form-group">
                                <label>عنوان پست</label>
                                <input name="title" type="text" class="form-control form-control-solid"
                                    placeholder="عنوان پست را وارد کنید" required>
                            </div>
                            <div class="form-group">
                                <label>انتخاب دسته بندی</label>
                                <select name="category" class="form-control form-control-solid" required>
                                    @foreach ($categories as $cate)
                                        <option value='{{ $cate->id }}'>{{ $cate->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="post_body"> توضیحات پست</label>
                                <textarea name="desc" id="post_body" class="form-control form-control-solid" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>انتخاب عکس پست</label>
                                <input name="image" type="file" accept="images\*" class="form-control form-control-solid"
                                    placeholder="تگ پست را وارد کنید" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button name="insertPost" type="submit" class="btn btn-primary mr-2">انتشار پست</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>


            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'post_body' );
    </script>
@endsection
