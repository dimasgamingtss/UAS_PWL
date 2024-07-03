@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penjualan</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_name">Nama Pemesan</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $sale->customer_name }}" required>
        </div>
        <div class="form-group">
            <label for="products">Produk</label>
            @foreach($products as $product)
            <div class="form-check">
                <label class="form-check-label">
                    {{ $product->name }} - Rp{{ number_format($product->price, 0, ',', '.') }}
                </label>
                <input class="form-control" type="number" name="products[{{ $product->id }}]" value="{{ $sale->products->contains($product->id) ? $sale->products->find($product->id)->pivot->quantity : 0 }}" min="0">
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection