@extends('admin.layout.master')

@section('content')
    <div class="card shadow-sm col-md-8 mx-auto">
        <div class="card-header bg-warning text-dark">
            ویرایش کاربر: {{ $user->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">نام کاربر</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">ایمیل</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">رمز عبور جدید (اختیاری)</label>
                    <input type="password" name="password" class="form-control" placeholder="اگر نمی‌خواهید تغییر کند، خالی بگذارید">
                </div>


                <button type="submit" class="btn btn-warning">ذخیره تغییرات</button>
                <a href="{{ route('adminHome') }}" class="btn btn-secondary">انصراف</a>
            </form>
        </div>
    </div>
@endsection

