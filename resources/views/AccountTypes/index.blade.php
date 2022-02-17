@extends('layouts.admin')

@section('title', 'Account type')
@section('content-header', 'Account type List')
@section('content-actions')
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addAccType">
        Create category
    </button>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
 @include('AccountTypes.modal.create')

    <div class="card">
        <div class="card-body">
            @if($accountTypes->count() > 0)
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
                            @foreach ($accountTypes as $accountType)
                                <tr class="text-capitalize">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$accountType->name}}</td>
                                    <td>{{$accountType->description}}</td>
                                    <td>{{$accountType->user->first_name.''.$accountType->user->first_name}}</td>

                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#editAccType-{{$accountType->id}}" class="bg-success btn-sm text-white"><i class="fas fa-edit"></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#viewAccType-{{$accountType->id}}" class="bg-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteAccType-{{$accountType->id}}" class="bg-danger btn-sm text-white"><i
                                                    class="fas fa-trash"> </i></a>
                                    </td>
                                    @include('AccountTypes.modal.edit')
                                    @include('AccountTypes.modal.view')
                                    @include('AccountTypes.modal.delete')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="container">
                            <div class="col-md-12">

                                <ul class="pagination offset-lg-5 mt-2">
                                    {{$accountTypes->render()}}
                                </ul>
                            </div>
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
