@extends('user.layout.layout')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                @include('user.product.filter')
            </div>

            <div class="col-md-9">

                <div class="row">

                    @foreach($products as $product)
                        <div class="col-md-3 border my-3">

                            @for($i = 0; $i < 1; $i++)
                                <a href="{{ route('one-product', ['id' => $product->id_product]) }}">
                                    <img class="w-100" src="{{ asset('/storage/' . $product->images[$i]->image) }}"
                                         alt="">
                                </a>
                            @endfor

                            <div class="text-center">
                                <span><b>{{ $product->name }}</b></span> <br>
                                <span>{{ $product->gender->name }}</span> <br>
                            </div>

                            @if($product->discount !== 0)
                                <div class="text-center my-3 d-flex justify-content-around">
                                    <span class="text-danger price-decoration-discount">{{ $product->price }} </span>
                                    <span class="price-decoration"><b>{{ $product->price - ($product->price * $product->discount / 100) }} UAH</b></span>
                                </div>
                            @else
                                <div class="text-center my-3 d-flex justify-content-around">
                                    <span class="price-decoration"><b>{{ $product->price }} UAH</b></span>
                                </div>
                            @endif

                            <div class="d-flex justify-content-around mb-3">
                                {{--  модальное окно  --}}
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-{{ $product->id_product }}">в корзину
                                </button>

                                {{--  открыть карточку товара  --}}
                                <a class="btn btn-info"
                                   href="{{ route('one-product', ['id' => $product->id_product]) }}">подробнее</a>
                            </div>

                            {{--  модальное окно  --}}
                            @include('user.product.modal')

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="my-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>

    </div>
@endsection
