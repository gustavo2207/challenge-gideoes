@extends('pages.order.index')
@section('actions')
    <form action="{{ route('order.bulkDestroy') }}" method="POST" enctype="multipart/form-data">
        @method('DELETE')
        @csrf
        <label for="ids">Selecione seus pedidos para deletar em massa</label>
        <select class="form-select" name="ids[]" multiple>
            @foreach ($orders as $order)
                <option value="{{ $order->id }}">{{ $order->order_number }}</option>
            @endforeach
        </select>
        <h6>control + clique para selecionar varios!</h6>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success">Deletar</button>
        </div>
    </form>
@endsection
