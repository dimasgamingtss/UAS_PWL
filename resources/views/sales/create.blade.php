@extends('layouts.app')

@section('content')
<link href="{{ asset('css/sale.css') }}" rel="stylesheet">
<div class="sale-container">
    <h1>Tambah Penjualan</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_name">Nama Pemesan</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>
        <div class="form-group">
            <label for="products">Produk</label>
            @foreach ($products as $product)
            <div class="form-check">
                <label for="product_{{ $product->id }}">{{ $product->name }} - Rp{{ number_format($product->price, 0, ',', '.') }}</label>
                <input type="number" class="form-control" id="product_{{ $product->id }}" name="products[{{ $product->id }}]" value="0" min="0">
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection