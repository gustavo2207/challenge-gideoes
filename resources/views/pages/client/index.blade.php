@extends('home')
@section('title', 'Clientes')
@section('content')

    <div class="container">
        @include('components.buttons', [
            'createRoute' => 'client.create',
            'listRoute' => 'client.index',
            'bulkDeleteRoute' => 'client.showBulkDelete',
        ])

        @yield('actions')

    </div>

@endsection
