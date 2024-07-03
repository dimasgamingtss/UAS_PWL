<!-- Path: resources/views/sales/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Riwayat Penjualan</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemesan</th>
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
                <td>{{ $sale->created_at }}</td>
                <td>{{ $sale->total_price }}</td>
                <td>
                    <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info">Detail Pesanan</a>
                    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('invoice.show', $sale->id) }}" target="_blank" class="btn btn-primary">Cetak Invoice</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
