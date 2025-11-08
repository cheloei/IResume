@extends('layouts.baseBlog')
@section('title', 'ویرایش پست')
@section('dash', true)
@section('page')
    <div class="content flex-column-fluid my-3" id="kt_content">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">
                    ویرایش مطلب
                </h3>
            </div>
            <form action="{{ route('updatePost') }}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                <input type="hidden" name="resume" value="{{ $resume->id }}">
                <input type="hidden" name="id" value="{{ $id->id }}">
                <div class="card-body">
                    <div class="form-group form-group-last">
                    </div>
                    <div class="form-group">
                        <label>عنوان پست</label>
                        <input name="title" value="{{ $id->title }}" type="text"
                            class="form-control form-control-solid" placeholder="عنوان پست را وارد کنید" required>
                    </div>
                    <div class="form-group">
                        <label>انتخاب دسته بندی</label>
                        <select name="category" class="form-control form-control-solid" required>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""> توضیحات پست</label>
                        <textarea name="body" id="body" class="form-control form-control-solid" rows="5">{{ $id->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <img width="200px" height="110px" src="{{ env('i_Resume_Files_URL') . '/images/blog/post/' . $id->image }}"
                            alt="">
                        <input name="image" type="file" class="form-control form-control-solid" />
                    </div>
                </div>
                <div class="card-footer">
                    <button name="updatePost" type="submit" class="btn btn-success">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
