@extends('layouts.app')

@section('title', 'User List')

@section('css')
<link rel="stylesheet" href="{{ asset('css/adminindex.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="sidebar">
            <a href="{{ route('admin.products.index') }}">View Products</a>
            <a href="{{ route('admin.products.create') }}">Add Product</a>
            <a href="{{ route('admin.users.index') }}">Users</a>
            <!-- Add other links as needed -->
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <h2>User List</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <!-- Add any actions you need here -->
                                <a href="#" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
