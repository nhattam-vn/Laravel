@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>{{ $viewData["subtitle"] }}</span>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary btn-sm">
            Quay lại danh sách
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($viewData["products"]->isEmpty())
            <p>Không có sản phẩm nào trong thùng rác.</p>
        @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Khôi phục</th>
                    <th>Xóa vĩnh viễn</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('admin.product.restore', $product->id) }}" 
                           class="btn btn-success btn-sm">
                           Khôi phục
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.product.forceDelete', $product->id) }}" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn không?')">
                           Xóa vĩnh viễn
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $viewData["products"]->links() }}
        @endif
    </div>
</div>
@endsection
