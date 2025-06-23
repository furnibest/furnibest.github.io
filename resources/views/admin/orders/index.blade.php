@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar Order (Admin)</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->email ?? '-' }}</td>
                <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                <td>
                    @if($order->status == 'completed')
                        <span class="badge bg-success">Selesai</span>
                    @elseif($order->status == 'pending')
                        <span class="badge bg-warning text-dark">Menunggu</span>
                    @else
                        <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                    @endif
                </td>
                <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 