@extends('pages.client.index')
@section('actions')
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($clients as $client)
                <tr>
                    <th scope="row">{{ $client->id }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('client.edit', $client->id) }}" method="GET" enctype="multipart/form-data">
                            @csrf()
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="{{ route('client.destroy', $client->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('DELETE')
                            @csrf()
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <caption class="fs-4 text text-center"> Parece que não há nenhum cliente cadastrado...</caption>
            @endforelse

        </tbody>
    </table>

    @if (count($clients) > 0)
        {{ $clients->links('custom.pagination') }}
    @endif
@endsection
