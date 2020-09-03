@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container">
    <h1>Produtos</h1>
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Produto</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">SKU</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Quantidade</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
      </form>
</div>
@endsection
