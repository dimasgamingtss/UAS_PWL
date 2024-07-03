@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hasil Penjualan</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemesan</th>
                <th>Kasir</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->customer_name }}</td>
                <td>{{ $sale->user->name }}</td>
                <td>{{ $sale->created_at }}</td>
                <td>{{ $sale->total_price }}</td>
                <td>
                    <a href="{{ route('products.sales.show', $sale->id) }}" class="btn btn-info">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection