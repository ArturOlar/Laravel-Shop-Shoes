@extends('user.layout.layout')

@section('content')
    <div class="container">

        {{--  банер  --}}
        <div>
            <img class="w-100" src="{{ asset('/storage/baner/3159513.jpg') }}" alt="">
        </div>

        {{--  изображение брендов  --}}
        <div>
            <h3 class="text-center mt-5">Популярные бренды</h3>
            <div class="center">
                @foreach($brands as $brand)
                    <div class="mt-5 images-brand-block">
                        <img class="images-brand" src="{{ asset("/storage/brands/$brand") }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>

        {{--  товары  --}}
        <div>
            <h3 class="text-center mt-5">Хиты продаж</h3>
            <div class="main-products">
                @foreach($products as $product)
                    <div class="col-md-3 border my-3">

                        @for($i = 0; $i < 1; $i++)
                            <a href="{{ route('one-product', ['id' => $product->id_product]) }}">
                                <img class="w-100" src="{{ asset('/storage/' . $product->images[$i]->image) }}" alt="">
                            </a>
                        @endfor

                        <div class="text-center">
                            <span><b>{{ $product->name }}</b></span> <br>
                            <span>{{ $product->gender->name }}</span> <br>
                        </div>

                        @if(isset($product->discount))
                            <div class="text-center my-3 d-flex justify-content-around">
                                <span class="text-danger price-decoration-discount">{{ $product->price }} </span>
                                <span class="price-decoration"><b>{{ $product->price - ($product->price * $product->discount / 100) }} UAH</b></span>
                            </div>
                        @else
                            <span>цена: {{ $product->price }}</span>
                        @endif

                        <div class="d-flex justify-content-around mb-3">

                            {{--  открыть карточку товара  --}}
                            <a class="btn btn-info" href="{{ route('one-product', ['id' => $product->id_product]) }}">подробнее</a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        {{--  категории  --}}
        <div class="my-5">
            <h3 class="text-center pt-4">популярные категории</h3>
            <div class="d-flex justify-content-around ">
                <div class="my-5">
                    <a href="http://shoes/public/products?price_from=&price_to=&id_category%5B%5D=4">
                        <img src="{{ asset("/storage/category/kozaki.jpg") }}" alt="">
                    </a>
                    <h3 class="mt-3 ml-3">Туфли</h3>
                </div>

                <div class="my-5">
                    <a href="http://shoes/public/products?price_from=&price_to=&id_category%5B%5D=1">
                        <img src="{{ asset("/storage/category/sniksy.jpg") }}" alt="">
                    </a>
                    <h3 class="mt-3 ml-3">Кроссовки</h3>
                </div>

                <div class="my-5">
                    <a href="http://shoes/public/products?price_from=&price_to=&id_category%5B%5D=2">
                        <img src="{{ asset("/storage/category/trekkingi.jpg") }}" alt="">
                    </a>
                    <h3 class="mt-3 ml-3">Ботинки</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
