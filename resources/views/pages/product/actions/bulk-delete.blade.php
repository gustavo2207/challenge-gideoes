@extends('pages.product.index')
@section('actions')
    <form action="{{ route('product.bulkDestroy') }}" method="POST" enctype="multipart/form-data">
        @method('DELETE')
        @csrf
        <label for="ids">Selecione seus produtos para deletar em massa</label>
        <select class="form-select" name="ids[]" multiple>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
        <h6>control + clique para selecionar varios!</h6>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success">Deletar</button>
        </div>
    </form>
@endsection
