{{--  модальное окно для добавления товара из каталога товаров в корзину  --}}
<div class="modal fade" id="modal-{{ $product->id_product }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Выбрете размер</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    @for($i = 0; $i < 1; $i++)
                        <img class="w-100" src="{{ asset('/storage/' . $product->images[$i]->image) }}" alt="">
                    @endfor

                        <span><b>{{ $product->id_product }}</b></span> <br>
                        <span><b>{{ $product->name }}</b></span> <br>
                        <span>{{ $product->gender->name }}</span> <br>
                </div>

                <div class="text-center">

                    <form action="{{ route('add-to-basket') }}" method="POST">
                        @csrf

                        {{--  количество товаров для добавления в корзину  --}}
                        <div class="my-3">
                            <div class="row d-flex justify-content-center">
                                <button type="button" onclick="addToBasketCatalog({{ $product->id_product }})" class="btn btn-success mr-1">+</button>
                                <input name="count" id="add-to-basket-count-catalog-{{ $product->id_product }}" type="text" class="form-control w-25 text-center" value="1">
                                <button type="button" onclick="minusToBasketCatalog({{ $product->id_product }})" class="btn btn-warning ml-1">-</button>
                            </div>
                        </div>

                        <div class="my-3">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Размеры</button>
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

                            <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                            <button class="btn btn-success">в корзину</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
