@extends('admin.layout.master')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            لیست کاربران حذف شده
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>حذف شده در زمان</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deleted_users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->deleted_at }}</td>
                        <td>
                            <form action="{{ route('admin.users.restore', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-sm btn-danger">بازنشانی</button>
                            </form>

                            <form action="{{ route('admin.users.hard_delete', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این کاربر مطمئن هستید؟');">
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
