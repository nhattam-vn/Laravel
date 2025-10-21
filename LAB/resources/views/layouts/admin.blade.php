<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('./css/admin.css') }}" rel="stylesheet">
    <title>@yield('title','Admin')</title>
</head>
<body>
    <div class="row g-0">
        <!--sidebar-->
        <div class="p-3 col fixed text-white bg-dark">
            <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                <span class="fs-4">Dashboard</span>
            </a>
            <hr />
            <ul class="nav flex-column">
                <li>
                    <a href="{{ route('admin.home.index') }}" class="nav-link text-white">Admin - Trang chủ</a>
                </li>
                <li>
                    <a href="{{ route('admin.product.index') }}" class="nav-link text-white">Admin - Quản lý sản phẩm</a>
                </li>
                <li>
                    <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">Quay lại Trang chủ</a>
                </li>
            </ul>
        </div>
        <!--Endsidebar-->
        <div class="col content-gray">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">Admin</span>
                <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
            </nav>
            <div class="g-0 m-5">@yield('content')</div>
        </div>
    </div>
    <!--Footer-->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank" href="">Nguyễn Nhất Tâm - CKC</a>
            </small>
        </div>
    </div>
    <!--EndFooter-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>