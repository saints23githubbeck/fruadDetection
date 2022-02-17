@extends('layouts.admin')
@section('title', 'Transactions')
@section('content-header', 'Transaction')

@section('content')
<div class="card">
    <div class="card-body">
                <div class="container offset-2">
                    <div class="row">
                        <div class="col-md-8 ">
                            <form  action="{{route('transaction.add')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                                               name="amount"  placeholder="Amount" value="{{ old('amount') }}"  autocomplete="amount" >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-cash-register"></span>
                                            </div>
                                        </div>

                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="input-group">
                                        <select id="country"  class="form-control @error('country') is-invalid @enderror" name="country">

                                            <option value=""><--country --></option>
                                            <option value="ghana">ghana</option>
                                            <option value="usa">usa</option>
                                            <option value="canada">canada</option>

                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-location-arrow"></span>
                                            </div>
                                        </div>
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-primary">Save</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>

    </div>

@endsection

