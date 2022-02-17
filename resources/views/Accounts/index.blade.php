@extends('layouts.admin')

@section('title', 'Account')
@section('content-header', 'Clients Account  List')
@section('content-actions')
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addAccount">
        Create Account
    </button>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')


    <div class="card">
        <div class="card-body">
            @if($accounts->count() > 0)
              <div class="container">
                  <div class="table-responsive">
                      <table class="table">
                          <thead class="shadow bg-primary text-warning">
                          <tr class="shadow-sm">
                              <th>#</th>
                              <th>Account Owner</th>
                              <th>Amount</th>
                              <th>Account Type</th>
                              <th>Created Date</th>
                              <th>Actions</th>
                          </tr>
                          </thead>
                          <tbody>

                          @foreach ($accounts as $account)
                              <tr class="text-capitalize">
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$account->user->first_name.' '.$account->user->last_name}}</td>
                                  <td>{{ config('settings.currency_symbol') }} {{$account->amount}}</td>
                                  <td>{{$account->accountType->name}}</td>

                                  <td>{{$account->created_at->format('d-M-Y')}}</td>

                                  <td>
                                      <a data-bs-toggle="modal" data-bs-target="#editAccount-{{$account->id}}" class="bg-success btn-sm text-white"><i class="fas fa-edit"></i></a>
                                      <a data-bs-toggle="modal" data-bs-target="#viewAccount-{{$account->id}}" class="bg-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                      <a data-bs-toggle="modal" data-bs-target="#deleteAccount-{{$account->id}}" class="bg-danger btn-sm text-white"><i
                                                  class="fas fa-trash"> </i></a>
                                  </td>
                                  @include('Accounts.modal.edit')
                                  @include('Accounts.modal.view')
                                  @include('Accounts.modal.delete')
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                      <div class="container">
                          <div class="col-md-12">
                              {{--{{$technicalDetails->render()}}--}}
                              <ul class="pagination offset-lg-5 mt-2">

                                  {{$accounts->render()}}
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
        @include('Accounts.modal.create')
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@endsection
