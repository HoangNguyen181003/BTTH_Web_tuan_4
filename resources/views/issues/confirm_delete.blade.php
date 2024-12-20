@extends('layouts.app')

@section('title', 'Xác Nhận Xóa')

@section('content')
<div class="container">
    <h1 class="my-4">Xác Nhận Xóa Vấn Đề</h1>

    <div class="alert alert-warning">
        Bạn có chắc chắn muốn xóa vấn đề này không? Đây là hành động không thể hoàn tác.
    </div>

    <form action="{{ route('issues.destroy', $issue->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Xóa Vấn Đề</button>
        <a href="{{ route('issues.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
