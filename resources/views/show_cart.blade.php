@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cart') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @php
                            $total_price = 0;
                        @endphp

                        <div class="card-group m-auto">
                            @foreach ($carts as $cart)
                                <div class="card mb-3" style="width: 14rem;">
                                    <img class="card-img-top" src="{{ url('storage/' . $cart->product->image) }}"
                                        alt="Product Image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cart->product->name }}</h5>
                                        <form action="{{ route('update_cart', $cart) }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" aria-describedby="basic-addon"
                                                    name="amount" value="{{ $cart->amount }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Update
                                                        Amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                @php
                                    $total_price += $cart->product->price * $cart->amount;
                                @endphp
                            @endforeach
                        </div>

                        <div class="d-flex flex-column justify-content-end align-items-end ">
                            <p>Total : Rp {{ $total_price }} </p>
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"
                                    {{ $carts->isEmpty() ? 'disabled' : '' }}>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
