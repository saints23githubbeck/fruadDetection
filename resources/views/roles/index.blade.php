@extends('layouts.admin')

@section('title', 'Role List')
@section('content-header', 'Role List')
@section('content-actions')
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addRole">
        Create Role
    </button>

@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    @include('roles.create')
<div class="card">
    <div class="card-body">
        @if($roles->count() > 0)
            <div class="container">
                <table class="table-responsive">
                    <table class="table">
                        <thead class="shadow bg-primary text-warning">
                        <tr class="shadow-sm">
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="text-capitalize">{{$loop->iteration}}</td>
                                <td class="text-capitalize">{{$role->name}}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editRole-{{$role->id}}" class="bg-success btn-sm text-white"><i
                                                class="fas fa-edit"></i></a>
                                    <a class="bg-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#viewRole-{{$role->id}}"><i
                                                class="fas fa-eye"></i></a>
                                    <a class=" btn-danger  btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deleteRole{{$role->id}}"><i
                                                class="fas fa-trash"> </i></a>
                                </td>
                            </tr>
                            @include('roles.edit')
                            @include('roles.view')
                            @include('roles.delete')
                        @endforeach
                        </tbody>
                    </table>
                </table>
                @if (isset($roles))

                    <div class="container">
                        <div class="col-md-12">
                            {{--{{$technicalDetails->render()}}--}}
                            <ul class="pagination offset-lg-5 mt-2">
                                <li class="page-item mr-1"><a class="page-link" href="{{ $roles->previousPageUrl() }}">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="{{ $roles->nextPageUrl() }}">Next</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
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
<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-delete', function () {
            $this = $(this);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success m-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {_method: 'DELETE', _token: '{{csrf_token()}}'}, function (res) {
                        $this.closest('tr').fadeOut(500, function () {
                            $(this).remove();
                        })
                    })
                }
            })
        })
    })
</script>
@endsection
