@extends('layouts.admin')

@section('title', 'User List')
@section('content-header', 'User List')
@section('content-actions')
    <button data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-outline-success ">Add User</button>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    @include('auth.create')

    <div class="card">
        <div class="card-body">
            @if($users->count() > 0)
            <div class="container">
                <div class="col-md-6 offset-2 mt-5">

                </div>
                <table class="table">
                    <thead class="shadow bg-primary text-warning">
                    <tr class="shadow-sm">
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img class="img-fluid rounded-circle" src="/images/logo.png " alt="" width="50"></td>
                            <td>{{ucfirst($user->first_name.' '.$user->last_name)}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->contact}}</td>
                            <td>
                                <a  data-bs-toggle="modal" data-bs-target="#editUser-{{$user->id}}" class="bg-success btn-sm text-white"><i
                                            class="fas fa-edit"></i></a>
                                <a  data-bs-toggle="modal" data-bs-target="#viewUser-{{$user->id}}" class="bg-info btn-sm text-white"><i
                                            class="fas fa-eye"></i></a>
                                <a class="bg-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deleteUser-{{$user->id}}"><i
                                            class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @include('auth.view')
                        @include('auth.delete')
                        @include('auth.edit')
                    @endforeach
                    </tbody>
                </table>
                <div class="container">
                    <div class="col-md-12">

                        <ul class="pagination offset-lg-5 mt-2">
                            {{$users->render()}}
                        </ul>
                    </div>
                </div>
            </div>
            @else
                <div class="text-center mb-4">
                    <img src="/images/result.gif" class="img-fluid" alt="">
                    <i>No records were found</i>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection
