@extends('user.layout.layout')

@section('content')
    <div class="container">
        <div class="row">

            {{--  изображение  --}}
            <div class="col-md-6">
                <div class="slider-wrap">
                    <div class="slider-for">
                        @for($i = 0; $i < count($product->images); $i++)
                            <div>
                                <img class="w-100" src="{{ asset('/storage/' . $product->images[$i]->image) }}">
                            </div>
                        @endfor
                    </div>

                    <div class="slider-nav">
                        @for($i = 0; $i < count($product->images); $i++)
                            <div>
                                <img class="w-75" src="{{ asset('/storage/' . $product->images[$i]->image) }}">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            {{--  информация о товаре и форма добавления товара в корзину  --}}
            <div class="col-md-5 my-5 ml-5">
                <p><b>{{ $product->name }}</b></p>
                <p>для кого: <b>{{ $product->gender->name }}</b></p>
                <p>категория: <b>{{ $product->category->name }}</b></p>
                <p>бренд: <b>{{ $product->brand->name }}</b></p>

                @if($product->discount !== 0)
                    <div class="my-5 ml-5">
                        <span class="text-danger price-decoration-discount mr-5">{{ $product->price }} </span>
                        <span class="price-decoration"><b>{{ $product->price - ($product->price * $product->discount / 100) }} UAH</b></span>
                    </div>
                @else
                    <div class="my-5 ml-5">
                        <span class="price-decoration"><b>{{ $product->price }} UAH</b></span>
                    </div>
                @endif

                {{--  форма добавления товара в корзину  --}}
                <form action="{{ route('add-to-basket') }}" method="POST">
                    @csrf

                    <div>
                        {{--  список размеров обуви  --}}
                        <div class="mt-5">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Размеры
                            </button>
                            <ul class="dropdown-menu checkbox-menu allow-focus">
                                @foreach($product->sizes as $sizes)
                                    @if($sizes->balance_product !== 0)
                                        <li class="ml-2">
                                            <label>
                                                <input name="id_size" value="{{ $sizes->size->id_size }}" type="radio">
                                                {{ $sizes->size->size }} </label>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        {{--  количество товаров для добавления в корзину  --}}
                        <div class="row ml-1 my-3">
                            <button id="add-to-basket-plus" class="btn btn-success mr-1"> +</button>
                            <input id="add-to-basket-count" class="form-control w-25 text-center" type="text"
                                   name="count" value="1">
                            <button id="add-to-basket-minus" class="btn btn-warning ml-1"> -</button>
                        </div>

                        {{--  добавление товара в корзину  --}}
                        <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                        <input class="btn btn-success" type="submit" value="В корзину">
                    </div>
                </form>

                {{--  описание товара  --}}
                <div class="border-top my-5">
                    <h4 class="text-center py-5">Описание</h4>
                    <span>{{ $product->desc }}</span>
                </div>
            </div>
        </div>

        {{--  форма добавления отзыва  --}}
        <div class="pt-5 mt-5 col-md-8 offset-2 border-top">
            <form action="{{ route('add-review') }}" method="POST">
                <h4 class="text-center">Оставить отзыв</h4>

                @csrf
                <div class="form-group">
                    <label for="name">Ваше имя</label>
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="ваше имя">
                </div>

                <div class="form-group">
                    <label for="email">Ваше email</label>
                    <input value="{{ old('user_email') }}" name="user_email" type="email" class="form-control @error('user_email') is-invalid @enderror" id="email" placeholder="ваше email">
                </div>

                <div class="form-group">
                    <label for="review">Ваш отзыв</label>
                    <textarea name="review" class="form-control @error('review') is-invalid @enderror" id="review" rows="3">{{ old('user_email') }}</textarea>
                </div>

                <input type="hidden" name="id_status" value="1">
                <input type="hidden" name="id_product" value="{{ $product->id_product }}">

                <div class="text-center">
                    <input class="btn btn-success" type="submit" value="отправить">
                </div>

            </form>
        </div>

        {{-- все отзывы --}}
        <div class="pt-5 mt-5 col-md-8 offset-2 border-top">
            @foreach($reviews as $review)
                @if(empty($review))
                    <h4 class="text-center my-5">Коментариев пока нет...</h4>
                @else
                    @if($review->id_status == '2')
                        <div class="py-3 border-top">
                            <div class="row">
                                <div class="col-md-8 border-right">
                                    <p class=""><b>{{ $review->review }}</b></p>
                                </div>
                                <div class="col-md-4">
                                    <span>Имя: <b>{{ $review->name }}</b></span> <br>
                                    <span>{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>

    </div>
@endsection
