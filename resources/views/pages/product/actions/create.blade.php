@extends('pages.product.index')
@section('actions')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2">

            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control" aria-labelledby="Nome">
        </div>
        <div class="mt-2">

            <label for="price" class="form-label">Preço</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" id="price" name="price" class="form-control" aria-labelledby="Preço">
                <span class="input-group-text">.00</span>
            </div>
        </div>
        <div class="mt-2">
            <label for="barCode" class="form-label">Código de Barras</label>
            <input type="number" id="barCode" name="barCode" class="form-control" aria-labelledby="Código de Barras">

        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success">Criar</button>
        </div>

    </form>
@endsection
