@extends('pages.product.index')
@section('actions')
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Código de Barras</th>
                <th scope="col">Preço</th>
                <th scope="col">Promoção</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->barCode }}</td>
                    <td>${{ str_replace('.', ',', $product->price) }}</td>
                    <td>{{ $product->promotion }}%</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('product.edit', $product->id) }}" method="GET"
                            enctype="multipart/form-data">
                            @csrf()
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('DELETE')
                            @csrf()
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <caption class="fs-4 text text-center"> Parece que não há nenhum produto cadastrado...</caption>
            @endforelse

        </tbody>
    </table>

    @if (count($products) > 0)
        {{ $products->links('custom.pagination') }}
    @endif
@endsection
