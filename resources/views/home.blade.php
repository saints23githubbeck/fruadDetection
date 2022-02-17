@extends('layouts.admin')

@section('content-header', 'ANOMALY  DETECTED')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger p-3 ">
                    <div class="inner text-center">
                        <p class="mt-1 text-white"> HIGHLY SEVERITY</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner p-4 text-center">
                        <p class="mt-1 text-white"> LOW SEVERITY</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                {{--{{dd()}}--}}
                <div class="small-box bg-orange">
                    <div class="inner text-center p-4">
                        <p class="mt-1 text-white"> MEDIUM SEVERITY</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6" data-toggle="">
                <!-- small box -->
                {{--{{dd()}}--}}
                <div class="small-box bg-success">
                    <div class="inner text-center p-4">
                        <p class="mt-1 text-white"> NORMAL SEVERITY</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="invoices">
                    <h3 class="text-center">Sales</h3>

                    <table class="table mt-3 ">
                        <thead class="shadow text-center bg-primary text-white">
                        <tr class="shadow-sm">
                            <th scope="col">#</th>
                            <th scope="col">Clients</th>
                            <th scope="col">Amount</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Country</th>
                            <th scope="col">Transaction date</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)

                            @php

                                $getDate = Carbon\Carbon::now()->subHour(720)->toDateTimeString()
                            @endphp
                            {{--{{dd($getDate)}}--}}
                            <tr class="text-center shadow-sm">
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @if($transaction->amount >= 500)
                                        <a     class="badge btn-sm status text-white bg-warning text-capitalize"  data-toggle="tooltip"
                                           title="unusual transaction Detected On The Side of {{ucwords($transaction->user->first_name.' '.$transaction->user->first_name)}}">
                                            {{ucwords($transaction->user->first_name)}}
                                        </a>
                                        @include('Transactions.Models.block')
                                    @elseif($transaction->created_at > $getDate &&  $transaction->country != $transaction->user->country )
                                        <a href="" data-bs-toggle="modal" data-bs-target="#blockUser-{{$transaction->user->id}}" class="badge status text-white bg-danger" data-toggle="tooltip"
                                           title="The Client  {{ucwords($transaction->user->first_name.' '.$transaction->user->first_name)}}  Need To block!!!  Click To block NOW">
                                            {{$transaction->user->first_name}}
                                        </a>
                                    @elseif( $transaction->country != $transaction->user->country && $transaction->ip != $transaction->user->ip)
                                        <a href="" class="badge status text-white bg-orange " data-toggle="tooltip"
                                           title="The Client  {{ucwords($transaction->user->first_name.' '.$transaction->user->first_name)}}  Need To Be Monitered ">
                                            {{$transaction->user->first_name}}
                                        </a>
                                    @else
                                        <a href="" class="badge status bg-success" data-toggle="tooltip"
                                           title="Normal Client  {{ucwords($transaction->user->first_name.' '.$transaction->user->first_name)}}">
                                           {{$transaction->user->first_name}}
                                        </a>
                                    @endif
                                </td>
                                <td>{{number_format($transaction->amount,2)}}</td>
                                <td>
                                    <a href="" class="text-primary">
                                        {{$transaction->country}}
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="text-primary">
                                        {{$transaction->ip}}
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="text-primary">
                                        {{Carbon\Carbon::parse($transaction->created_at)->format('d-M-Y')}}
                                    </a>
                                </td>

                                <td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="container">
                        <div class="col-md-12">
                            {{--{{$technicalDetails->render()}}--}}
                            <ul class="pagination offset-lg-5 mt-2">

                                {{$transactions->render()}}
                            </ul>

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>



@endsection
