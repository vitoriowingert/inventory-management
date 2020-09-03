@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3 class="text-center">Produtos</h3>
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
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <form id="frmDelete{{ $product->id }}" >
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="productid" value="{{ $product->id }}">
                            <input type="submit" name="btnDelete" onclick="deleteItem($(this).parent());" value="Excluir">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
