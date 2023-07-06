@extends('home')
@section('title', 'Pedidos')
@section('content')

    <div class="container">
        @include('components.buttons', [
            'createRoute' => 'order.create',
            'listRoute' => 'order.index',
            'bulkDeleteRoute' => 'order.showBulkDelete',
        ])

        @yield('actions')

    </div>
@endsection
