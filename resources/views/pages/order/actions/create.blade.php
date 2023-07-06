@extends('pages.order.index')
@section('actions')
    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            <label for="cpf" class="form-label">CPF do Cliente</label>
            <input type="number" id="cpf" name="cpf" class="form-control">
        </div>
        <div class="mt-2">
            <label for="order_date" class="form-label">Data do Pedido</label>
            <input type="date" id="order_date" name="order_date" class="form-control">
        </div>
        <div class="mt-2">
            <label for="product_id" class="form-label">Identificador do Produto</label>
            <input type="text" id="product_id" name="product_id" class="form-control">
        </div>
        <div class="mt-2">
            <label for="quantity" class="form-label">Quantidade</label>
            <input type="number" id="quantity" name="quantity" class="form-control">
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success">Criar</button>
        </div>

    </form>
@endsection
