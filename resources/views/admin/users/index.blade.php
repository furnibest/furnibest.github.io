@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar User (Admin)</h1>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role === 'admin')
                        <span class="badge bg-success">admin</span>
                    @else
                        <span class="badge bg-primary">user</span>
                    @endif
                </td>
                <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 