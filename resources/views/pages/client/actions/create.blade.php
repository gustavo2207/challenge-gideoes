@extends('pages.client.index')
@section('actions')
    <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2">

            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control" aria-labelledby="Nome">
        </div>
        <div class="mt-2">
            <label for="cpf" class="form-label">CPF</label>
            <input type="number" id="cpf" name="cpf" class="form-control" aria-labelledby="CPF">
        </div>
        <div class="mt-2">
            <label for="phone" class="form-label">Telefone</label>
            <input type="tel" id="phone" name="phone" class="form-control" aria-labelledby="Telefone">
        </div>
        <div class="mt-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" aria-labelledby="Código de Barras">

        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success">Criar</button>
        </div>

    </form>
@endsection
