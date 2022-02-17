@extends('layouts.admin')

@section('title', 'Client')
@section('content-header', 'Customer List')
@section('content-actions')
    <button data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-outline-success">Add Customer</button>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    @include('auth.create')
    <div class="card">
        <div class="card-body">
            {{--@if($customers->count() > 0)--}}
                {{--<div class="container">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table">--}}
                            {{--<thead class="shadow bg-primary text-warning">--}}
                            {{--<tr class="shadow-sm">--}}
                                {{--<th>#</th>--}}
                                {{--<th>Name</th>--}}
                                {{--<th>Email</th>--}}
                                {{--<th>Phone</th>--}}
                                {{--<th>Address</th>--}}
                                {{--<th>Actions</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach ($customers as $customer)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$loop->iteration}}</td>--}}
                                    {{--<td>{{$customer->first_name.' '.$customer->last_name}}</td>--}}
                                    {{--<td>{{$customer->email}}</td>--}}
                                    {{--<td>{{$customer->phone}}</td>--}}
                                    {{--<td>{{$customer->address}}</td>--}}
                                    {{--<td>--}}
                                        {{--<a  data-bs-toggle="modal" data-bs-target="#editCustomer-{{$customer->id}}" class="bg-success btn-sm text-white"><i--}}
                                                    {{--class="fas fa-edit"></i></a>--}}
                                        {{--<a  data-bs-toggle="modal" data-bs-target="#viewCustomer-{{$customer->id}}" class="bg-info btn-sm text-white"><i--}}
                                                    {{--class="fas fa-eye"></i></a>--}}
                                        {{--<a class="bg-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deleteCustomer-{{$customer->id}}"><i--}}
                                                    {{--class="fas fa-trash"></i></a>--}}
                                    {{--</td>--}}
                                    {{--@include('Clients.edit')--}}
                                    {{--@include('Clients.view')--}}
                                    {{--@include('Clients.delete')--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                        {{--<div class="container">--}}
                            {{--<div class="col-md-12">--}}

                                {{--<ul class="pagination offset-lg-5 mt-2">--}}
                                    {{--{{$customers->render()}}--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--@else--}}
                {{--<div class="text-center mb-4">--}}
                    {{--<img src="/images/result.gif" class="img-fluid" alt="">--}}
                    {{--<i>No records were found</i>--}}
                {{--</div>--}}
            {{--@endif--}}
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@endsection
