@extends('pages.order.index')
@section('actions')
    <form action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mt-2">
            <label for="cpf" class="form-label">CPF do Cliente</label>
            <input type="number" id="cpf" name="cpf" class="form-control" value="{{ $order->client->cpf }}">
        </div>
        <div class="mt-2">
            <label for="order_date" class="form-label">Data do Pedido</label>
            <input type="date" id="order_date" name="order_date" class="form-control" value="{{ $order->order_date }}">
        </div>
        <div class="mt-2">
            <label for="product_id" class="form-label">Identificador do Produto</label>
            <input type="text" id="product_id" name="product_id" class="form-control" value="{{ $order->product->id }}">
        </div>
        <div class="mt-2">
            <label for="quantity" class="form-label">Quantidade</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{ $order->quantity }}">
        </div>
        <div class="mt-2">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Em Aberto</option>
                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Pago</option>
                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success">Editar</button>
        </div>

    </form>
@endsection
