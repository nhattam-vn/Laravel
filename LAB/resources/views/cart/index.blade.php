@extends('layouts.app')
@section('title',$viewData['title'])
@section('subtitle',$viewData['subtitle'])
@section('content')
<div class="card">
    <div class="card-header">
        Sản phẩm trong giỏ hàng
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['products'] as $product)
                    <tr>
                        <td>{{ $product->getID() }}</td>
                        <td>{{ $product->getName() }}</td>
                        <td>{{ $product->getPrice() }}</td>
                        <td>{{ session('products')[$product->getId()] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Tổng tiền:</b> ${{ $viewData['total'] }}</a>
                <a class="btn btn-primary text-white mb-2">Thanh toán</a>
                <a href="{{ route('cart.delete') }}">
                    <button class="btn btn-danger mb-2">
                        Xóa tất cả sản phẩm!
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

