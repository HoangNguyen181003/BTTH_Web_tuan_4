@extends('layouts.app')

@section('title', 'Cập Nhật Vấn Đề')

@section('content')
<div class="container">
    <h1 class="my-4">Cập Nhật Vấn Đề</h1>

    <!-- Form cập nhật vấn đề -->
    <form action="{{ route('issues.update', $issue->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="computer_id" class="form-label">Máy Tính</label>
            <select name="computer_id" id="computer_id" class="form-select" required>
                <option value="">Chọn Máy Tính</option>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}" {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>
                        {{ $computer->computer_name }} ({{ $computer->model }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="reported_by" class="form-label">Người Báo Cáo</label>
            <input type="text" name="reported_by" class="form-control" id="reported_by" value="{{ $issue->reported_by }}" required>
        </div>

        <div class="mb-3">
            <label for="reported_date" class="form-label">Ngày Báo Cáo</label>
            <input type="datetime-local" name="reported_date" class="form-control" id="reported_date" value="{{ $issue->reported_date }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" class="form-control" id="description" rows="4" required>{{ $issue->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="urgency" class="form-label">Mức Độ</label>
            <select name="urgency" class="form-select" id="urgency" required>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Thấp</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Trung Bình</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>Cao</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng Thái</label>
            <select name="status" class="form-select" id="status" required>
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Mở</option>
                <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>Đang Xử Lý</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Đã Giải Quyết</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật Vấn Đề</button>
    </form>
</div>
@endsection
