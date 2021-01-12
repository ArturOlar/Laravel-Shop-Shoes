@extends('admin.layout.layout')

@section('content')
    <div class="container">

        <div class="col-md-6 offset-3">
            <h3 class="text-center my-4">id: {{ $product->id_product }} || {{ $product->name }}</h3>

            <form action="{{ route('change-balance-product') }}" method="POST">
                @csrf

                {{--  размеры  --}}
                <div class="row py-3">
                    @foreach($product->sizes as $size)
                        <div class="col-md-4 border-right py-3 border">
                            <b>размер: </b>{{ $size->size->size }}
                        </div>
                        {{--  количество товаров для добавления в корзину  --}}
                        <div class="col-md-8 border-right border">
                            <div class="row ml-1 my-3">
                                <button type="button" onclick="changeBalanceProductPlus({{ $size->id_size }})" class="btn btn-success mr-1"> + </button>
                                <input id="change-balance-product-count-{{ $size->id_size }}" class="form-control w-25 text-center" type="text"
                                       name="count[]" value="{{ $size->balance_product }}">
                                <button type="button" onclick="changeBalanceProductMinus({{ $size->id_size }})" class="btn btn-warning ml-1"> - </button>
                            </div>
                        </div>

                        <input type="hidden" name="id_product[]" value="{{ $product->id_product }}">
                        <input type="hidden" name="id_size[]" value="{{ $size->id_size }}">
                    @endforeach
                </div>

                <div class="text-center my-5">
                    <input type="submit" class="btn btn-success" value="Сохранить">
                </div>

            </form>

        </div>

    </div>
@endsection
