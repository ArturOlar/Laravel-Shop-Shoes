@extends('admin.layout.layout')

@section('content')
    <div class="container">

        <div class="col-md-6 offset-3 my-5">
            <h4 class="text-center my-5">Создать категорию</h4>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Название категории">
                </div>
                <div class="text-center my-5">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>

    </div>
@endsection
