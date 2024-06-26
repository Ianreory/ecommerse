@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Orders') }}</div>
                    <div class="card-body">
                        @foreach ($orders as $order)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="{{ route('show_order', $order) }}" class="text-decoration-none">
                                        <h5 class="card-title">Order {{ $order->id }}</h5>
                                    </a>
                                    <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>
                                    @if ($order->is_paid)
                                        <p class="card-text text-success">Paid</p>
                                    @else
                                        <p class="card-text text-danger">Unpaid</p>
                                        @if ($order->payment_receipt)
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ url('storage/' . $order->payment_receipt) }}"
                                                    class="btn btn-primary">Show Payment Receipt</a>
                                                @if (Auth::user()->is_admin)
                                                    <form action="{{ route('confirm_payment', $order) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-success" type="submit">Confirm</button>
                                                    </form>
                                                @endif

                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
