@extends('pages.order.index')
@section('actions')
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Informações sobre o pedido</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Número do Pedido: <i>{{ $order->order_number }}</i></h6>
            <p class="card-text">
                <dt>Status</dt>
                <dd class="ms-2">
                    @switch($order->status)
                        @case(1)
                            Pago
                        @break

                        @case(2)
                            Cancelado
                        @break

                        @default
                            Em Aberto
                    @endswitch
                </dd>
                <dt>Data do Pedido</dt>
                <dd class="ms-2">{{ date('d/m/Y', strtotime($order->order_date)) }}</dd>
                <dt>Quantidade</dt>
                <dd class="ms-2">{{ $order->quantity }}</dd>
                <dt>Valor total</dt>
                <dd class="ms-2">R$ {{ str_replace('.', ',', $order->order_value) }}</dd>
            </p>
        </div>
    </div>

    <div class="row mt-4 justify-content-around">

        <div class="card col-sm-5">
            <div class="card-body">
                <h5 class="card-title">Informações sobre o produto</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Identificador do produto:
                    <i>{{ $order->product->id }}</i>
                </h6>
                <p class="card-text">
                    <dt>Nome do Produto</dt>
                    <dd class="ms-2">{{ $order->product->name }}</dd>
                    <dt>Preço</dt>
                    <dd class="ms-2">R$ {{ str_replace('.', ',', $order->product->price) }}</dd>
                    <dt>Promoção</dt>
                    <dd class="ms-2">{{ $order->product->promotion }}%</dd>
                    <dt>Código de Barras</dt>
                    <dd class="ms-2">{{ $order->product->barCode }}</dd>
                </p>
            </div>
        </div>

        <div class="card col-sm-5">
            <div class="card-body">
                <h5 class="card-title">Informações sobre o Cliente</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Identificador do cliente:
                    <i>{{ $order->client->id }}</i>
                </h6>
                <p class="card-text">
                    <dt>Nome do Cliente</dt>
                    <dd class="ms-2">{{ $order->client->name }}</dd>
                    <dt>Telefone</dt>
                    <dd class="ms-2">R$ {{ $order->client->phone }}</dd>
                    <dt>Email</dt>
                    <dd class="ms-2">{{ $order->client->email }}</dd>
                    <dt>CPF</dt>
                    <dd class="ms-2">{{ $order->client->cpf }}</dd>
                </p>
            </div>
        </div>
    </div>
@endsection
