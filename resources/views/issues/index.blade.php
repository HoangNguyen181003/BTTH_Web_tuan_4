@extends('layouts.app')

@section('title', 'Danh Sách Vấn Đề')

@section('content')
<div class="container">
    <h1 class="my-4">Danh Sách Vấn Đề</h1>

    <!-- Thông báo khi có lỗi hoặc thành công -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Nút thêm vấn đề -->
    <a href="{{ route('issues.create') }}" class="btn btn-primary mb-4">Thêm Vấn Đề Mới</a>

    <!-- Bảng danh sách các vấn đề -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Máy Tính</th>
                <th>Người Báo Cáo</th>
                <th>Mô Tả</th>
                <th>Mức Độ</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($issues as $issue)
                <tr>
                    <td>{{ $issue->id }}</td>
                    <td>{{ $issue->computer->computer_name }}</td>
                    <td>{{ $issue->reported_by }}</td>
                    <td>{{ $issue->description }}</td>
                    <td>{{ $issue->urgency }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>
                        <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="{{ route('issues.confirmDelete', $issue->id) }}" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    {{ $issues->links() }}
</div>
@endsection
