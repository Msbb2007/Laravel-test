@extends('admin.layout.master')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            لیست کاربران سیستم
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @method('PUT')
                    @csrf
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-sm btn-info">ویرایش</a>
                            <form action="{{ route('admin.users.softDelete', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
