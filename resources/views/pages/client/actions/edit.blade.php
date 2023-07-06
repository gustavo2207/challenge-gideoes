@extends('pages.client.index')
@section('actions')
    <form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mt-2">

            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $client->name }}">
        </div>
        <div class="mt-2">
            <label for="cpf" class="form-label">CPF</label>
            <input type="number" id="cpf" name="cpf" class="form-control" value="{{ $client->cpf }}">
        </div>
        <div class="mt-2">
            <label for="phone" class="form-label">Telefone</label>
            <input type="tel" id="phone" name="phone" class="form-control" value="{{ $client->phone }}">
        </div>
        <div class="mt-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}">

        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success">Editar</button>
        </div>

    </form>
@endsection
