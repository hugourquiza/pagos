@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Payments')}}</div>
                <a href="/payment/new"><button id="create_btn" class="btn btn-primary card-img-top">{{__('Add Payment')}}</button></a>
                <div class="card-body">
                    @if (count($payments))
                    <table class='table table-striped table-bordered table-hover'>
                        <thead>
                            <tr>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Amount')}}</th>
                            </tr>
                        </thead>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{$payment->date_paid}}</td>
                            <td>{{$payment->amount}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

