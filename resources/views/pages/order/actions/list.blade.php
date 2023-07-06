@extends('pages.order.index')
@section('actions')
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Numero do Pedido</th>
                <th scope="col">Nome do Cliente</th>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->client->name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('order.show', $order->id) }}" method="GET" enctype="multipart/form-data">
                            @csrf()
                            <button type="submit" class="btn btn-success">Detalhes</button>
                        </form>
                        <form action="{{ route('order.edit', $order->id) }}" method="GET" enctype="multipart/form-data">
                            @csrf()
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('DELETE')
                            @csrf()
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <caption class="fs-4 text text-center"> Parece que não há nenhum pedido cadastrado...</caption>
            @endforelse

        </tbody>
    </table>

    @if (count($orders) > 0)
        {{ $orders->links('custom.pagination') }}
    @endif
@endsection
