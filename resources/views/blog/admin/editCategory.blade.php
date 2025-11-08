@extends('layouts.baseBlog')
@section('title', 'ویرایش دسته بندی')
@section('dash', true)
@section('page')
    <div class="content flex-column-fluid my-3" id="kt_content">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">
                    ویرایش دسته بندی
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('updateCategory')}}" method="post">
                    <div class="form-group">
                        <label>دسته بندی</label>
                        @csrf
                        <input type="hidden" name="resume" value="{{$resume->id}}">
                        <input type="hidden" name="id" value="{{$id->id}}">
                        <input name="title" value="{{$id->title}}" type="text"
                            class="form-control form-control-lg" placeholder="اسم دسته بندی را وارد کنید" />
                    </div>
            </div>
            <div class="card-footer">
                <button name="editCategory" type="submit" class="btn btn-success">ویرایش</button>
            </div>
            </form>
        </div>
    </div>
@endsection
