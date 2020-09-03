@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3 class="text-center">Produtos em Estoque</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('SKU') }}</th>
                    <th scope="col">{{ __('Nome') }}</th>
                    <th scope="col">{{ __('Total') }}</th>
                    <th scope="col">{{ __('Em Estoque') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <form method="POST" class="form-inline" action="{{ route('checkoutItem') }}">
                            @csrf
                            <input type="hidden" name="productid" value="{{ $product->id }}">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="number" id="checkout{{ $product->id }}" name="checkout{{ $product->id }}" class="form-control @error('checkout'.$product->id) is-invalid @enderror" value="{{ old('checkout'.$product->id) }}" required autocomplete="checkout" >

                                @error('checkout'.$product->id)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-secondary btn-sm mb-2">{{ __('Dar Baixa') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
