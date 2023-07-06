@extends('home')
@section('title', 'Produtos')
@section('content')
    <div class="container">
        @include('components.buttons', [
            'createRoute' => 'product.create',
            'listRoute' => 'product.index',
            'bulkDeleteRoute' => 'product.showBulkDelete',
        ])

        @yield('actions')
    </div>
@endsection
