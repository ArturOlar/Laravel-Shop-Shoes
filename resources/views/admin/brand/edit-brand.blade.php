@extends('admin.layout.layout')

@section('content')
    <div class="container">

        <div class="col-md-6 offset-3 my-5">
            <h4 class="text-center my-5">Редактировать бренд</h4>

            <form action="{{ route('brand.update', ['brand' => $brand->id_brand]) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <input value="{{ old('name', $brand->name) }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp" value="{{ $brand->name }}">
                </div>
                <div class="text-center my-5">
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </div>
            </form>
        </div>

    </div>
@endsection
