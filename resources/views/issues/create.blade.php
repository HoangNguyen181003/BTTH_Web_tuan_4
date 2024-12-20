@extends('layouts.app')

@section('title', 'Thêm Vấn Đề Mới')

@section('content')
<div class="container">
    <h1 class="my-4">Thêm Vấn Đề Mới</h1>

    <!-- Form thêm vấn đề -->
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="computer_id" class="form-label">Máy Tính</label>
            <select name="computer_id" id="computer_id" class="form-select" required>
                <option value="">Chọn Máy Tính</option>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->computer_name }} ({{ $computer->model }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="reported_by" class="form-label">Người Báo Cáo</label>
            <input type="text" name="reported_by" class="form-control" id="reported_by" required>
        </div>

        <div class="mb-3">
            <label for="reported_date" class="form-label">Ngày Báo Cáo</label>
            <input type="datetime-local" name="reported_date" class="form-control" id="reported_date" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="urgency" class="form-label">Mức Độ</label>
            <select name="urgency" class="form-select" id="urgency" required>
                <option value="Low">Thấp</option>
                <option value="Medium">Trung Bình</option>
                <option value="High">Cao</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng Thái</label>
            <select name="status" class="form-select" id="status" required>
                <option value="Open">Mở</option>
                <option value="In Progress">Đang Xử Lý</option>
                <option value="Resolved">Đã Giải Quyết</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Thêm Vấn Đề</button>
    </form>
</div>
@endsection
