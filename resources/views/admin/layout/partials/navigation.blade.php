<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">مدیریت</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('adminHome') }}">لیست کاربران</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.create') }}">کاربر جدید</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.deleted_users') }}">کاربران حذف شده</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
