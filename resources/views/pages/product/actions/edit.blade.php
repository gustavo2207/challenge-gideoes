@extends('pages.product.index')
@section('actions')
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mt-2">

            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="mt-2">
            <label for="price" class="form-label">Preço</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="text" id="price" name="price" class="form-control" value="{{ $product->price }}">
            </div>
        </div>
        <div class="mt-2">
            <label for="promotion" class="form-label">Promoção</label>
            <div class="input-group">
                <input type="text" id="promotion" name="promotion" class="form-control"
                    value="{{ $product->promotion }}">
                <span class="input-group-text">%</span>
            </div>
        </div>
        <div class="mt-2">
            <label for="barCode" class="form-label">Código de Barras</label>
            <input type="number" id="barCode" name="barCode" class="form-control" value="{{ $product->barCode }}">

        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success">Editar</button>
        </div>

    </form>
@endsection
