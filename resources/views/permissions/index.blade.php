@extends('layouts.admin')

@section('title', 'Permission List')
@section('content-header', 'Permission List')
@section('content-actions')
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addPermission">
        Create Permission
    </button>

@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    @include('permissions.create')
<div class="card">
    <div class="card-body">
        @if($permissions->count() > 0)
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="shadow bg-primary text-warning">
                        <tr class="shadow-sm">
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Added By</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->description}}</td>
                                <td>{{$permission->user->first_name.' '.$permission->user->last_name}}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editPermission-{{$permission->id}}" class="bg-success btn-sm text-white"><i
                                                class="fas fa-edit"></i></a>
                                    <a class="bg-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#viewPermission-{{$permission->id}}"><i
                                                class="fas fa-eye"></i></a>
                                    <a class=" btn-danger  btn-sm text-white "data-bs-toggle="modal" data-bs-target="#deletePermission-{{$permission->id}}"><i
                                                class="fas fa-trash"> </i></a>
                                </td>
                            </tr>
                            @include('permissions.edit')
                            @include('permissions.view')
                            @include('permissions.delete')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <div class="col-md-12">

                        <ul class="pagination offset-lg-5 mt-2">
                            {{$permissions->render()}}
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
