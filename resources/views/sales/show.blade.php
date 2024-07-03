<!-- Path: resources/views/sales/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penjualan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sale->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>Rp{{ $product->price * $product->pivot->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('sales.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection