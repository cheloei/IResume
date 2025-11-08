@extends('layouts.baseBlog')
@section('title', 'مدیریت دسته بندی ها')
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
    <div class="card card-custom gutter-b example example-compact my-3">
        <div class="card-header">
            <h3 class="card-title">
                دسته بندی ایجاد کنید
            </h3>
        </div>
        <div class="card-body">
            <form action="{{route('insertCategory')}}" method="post">
                @csrf
                <input type="hidden" name="resume" value="{{$resume->id}}">
                <div class="form-group">
                    <label>دسته بندی</label>
                    <input name="title" type="text" class="form-control form-control-lg"
                        placeholder="اسم دسته بندی را وارد کنید" />
                </div>
        </div>
        <div class="card-footer">
            <button name="insertCategory" type="submit" class="btn btn-success">ایجاد</button>
        </div>
        </form>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">
                            لیست دسته بندی ها
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-checkable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام دسته بندی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cate)
                                    <tr>
                                        <td>{{ $cate->id }}</td>
                                        <td>{{ $cate->title }}</td>
                                        <td>
                                            <a href="{{route('admin') . '/EditCategory/' . $resume->id . '/' . $cate->id}}" class="btn btn-success">ویرایش</a>
                                            <a href="{{route('admin') . '/deleteCategory/' . $resume->id . '/' . $cate->id}}" class="btn btn-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
