@extends('admin.layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">ثبت کاربر جدید</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.save-user') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">نام و نام خانوادگی</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Msbمثلا:" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">ایمیل</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="example@mail.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">رمز عبور</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>


                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">ذخیره کاربر</button>
                                <a href="{{ route('adminHome') }}" class="btn btn-light">انصراف</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

