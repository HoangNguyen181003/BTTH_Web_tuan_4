<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Chủ')</title>
    
    <!-- Liên kết Bootstrap CSS từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJfJf3t5z7Y3g4j2w6fHcYdmA95J5s+1my61H+fX0S2EowfW4Q5B6df0sftX" crossorigin="anonymous">
</head>
<body>
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('issues.index') }}">Quản Lý Vấn Đề</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issues.index') }}">Danh Sách Vấn Đề</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issues.create') }}">Thêm Vấn Đề Mới</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung chính của trang -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Liên kết Bootstrap JS từ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0F6gt1fWvqkBXlzch1hB6mWspH7AJSfJ61Od79doX5mJS0Xw" crossorigin="anonymous"></script>
</body>
</html>
