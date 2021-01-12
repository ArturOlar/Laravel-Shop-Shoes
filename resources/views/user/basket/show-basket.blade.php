@extends('user.layout.layout')

@section('content')
    <div class="container">

        @if(empty($products))
            <div class="mt-5 text-center">
                <h4 class="mt-5">Ваша корзина пуста...</h4>
            </div>
        @else
            <table class="table mt-5 border-bottom">
                <thead>
                <tr>
                    <th scope="col">изображение</th>
                    <th scope="col">наименование</th>
                    <th scope="col">категория</th>
                    <th scope="col">бренд</th>
                    <th scope="col">цена</th>
                    <th scope="col">скидка</th>
                    <th scope="col">размер</th>
                    <th scope="col">количество</th>
                    <th scope="col">сумма</th>
                </tr>
                </thead>
                <tbody>

                @php
                    $totalSum = 0;
                    $totalCount = 0;
                @endphp
                @foreach($products as $product)
                    <tr>
                        <td class="table-td-images">
                            <img src="{{ asset('/storage/' . $product['image']) }}" alt="">
                        </td>
                        <td>
                            <p class="table-td-text">{{ $product['name'] }}</p>
                        </td>
                        <td>
                            <p class="table-td-text">{{ $product['category'] }}</p>
                        </td>
                        <td>
                            <p class="table-td-text">{{ $product['brand'] }}</p>
                        </td>
                        <td>
                            <p class="table-td-text">{{ $product['price'] - ($product['price'] * $product['discount'] / 100) }}</p>
                        </td>
                        <td>
                            <p class="table-td-text">{{ $product['discount'] }}%</p>
                        </td>
                        <td>
                            <p class="table-td-text">{{ $product['size']->size }}</p>
                        </td>
                        <td id="basket-count-{{ $product['idProduct'] }}">
                            <p class="table-td-text">{{ $product['count'] }}</p>
                        </td>
                        <td>
                            <p class="table-td-text">{{ ($product['price'] - ($product['price'] * $product['discount'] / 100)) * $product['count'] }}</p>
                        </td>
                        <td>
                            <div class="table-td-text">
                                <a class="btn btn-success" href="{{ route('plus-product-by-basket', ['id' => $product['idProduct'], 'size' => $product['idSize'] ]) }}"> + </a>
                                <a class="btn btn-warning" href="{{ route('minus-product-by-basket', ['id' => $product['idProduct'], 'size' => $product['idSize'] ]) }}"> - </a>
                                <a class="btn btn-danger" href="{{ route('delete-product-by-basket', ['id' => $product['idProduct'], 'size' => $product['idSize'] ]) }}">&times;</a>
                            </div>
                        </td>
                    </tr>

                    @php $totalSum += $product['price'] * $product['count']; @endphp
                    @php $totalCount += $product['count']; @endphp
                @endforeach
                </tbody>
            </table>
            <div>
                <p>Общая сумма: {{ $totalSum }} UAH</p>
                <p>Общее количество: {{ $totalCount }} шт</p>
            </div>
        @endif

    </div>

    @include('user.basket.user-info')
@endsection
