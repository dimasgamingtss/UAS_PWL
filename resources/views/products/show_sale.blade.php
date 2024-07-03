@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penjualan</h1>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $sale->id }}</td>
        </tr>
        <tr>
            <th>Nama Pemesan</th>
            <td>{{ $sale->customer_name }}</td>
        </tr>
        <tr>
            <th>Kasir</th>
            <td>{{ $sale->user->name }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $sale->created_at }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>{{ $sale->total_price }}</td>
        </tr>
    </table>
    <a href="{{ route('products.sales') }}" class="btn btn-secondary">Kembali ke Hasil Penjualan</a>
</div>
@endsection