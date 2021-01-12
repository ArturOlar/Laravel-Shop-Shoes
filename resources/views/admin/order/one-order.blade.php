@extends('admin.layout.layout')

@section('content')
    <div class="container">
        <div class="col-md-10 offset-1 my-5">

            <h5 class="text-center my-4">Информация о клиенте:</h5>

            <div class="row border py-3">
                <div class="col-md-6 border-right">Имя:</div>
                <div class="col-md-6"><b>{{ $order->user_name }}</b></div>
            </div>
            <div class="row border py-3">
                <div class="col-md-6 border-right">Фамилия:</div>
                <div class="col-md-6"><b>{{ $order->user_surname }}</b></div>
            </div>
            <div class="row border py-3">
                <div class="col-md-6 border-right">Номер мобильного:</div>
                <div class="col-md-6"><b>{{ $order->user_phone }}</b></div>
            </div>
            <div class="row border py-3">
                <div class="col-md-6 border-right">Email:</div>
                <div class="col-md-6"><b>{{ $order->email }}</b></div>
            </div>
            <div class="row border py-3">
                <div class="col-md-6 border-right">Доставка:</div>
                <div class="col-md-6"><b>{{ $order->delivery }}</b></div>
            </div>
            <div class="row border py-3">
                <div class="col-md-6 border-right">Статус:</div>
                <div class="col-md-6"><b>{{ $order->status->name }}</b></div>
            </div>

            <h5 class="text-center my-4">Товары в заказе:</h5>

            @php
                $totalSum = 0;
                $totalCount = 0;
            @endphp
            @foreach($products as $product)
                <div class="row border py-3">
                    <div class="col-md-1 border-right">Id: <b>{{ $product->id_product }}</b></div>
                    <div class="col-md-2 border-right">Размер: <b>{{ $product->size->size }}</b></div>
                    <div class="col-md-4 border-right">Название товара: <b>{{ $product->product->name }}</b></div>
                    <div class="col-md-1 border-right">Кол: <b>{{ $product->count }}</b></div>
                    <div class="col-md-2 border-right">Цена: <b>{{ $product->price }}</b></div>
                    <div class="col-md-2">Cума: <b>{{ $product->price * $product->count }}</b></div>
                    @php $totalSum += $product->price * $product->count; @endphp
                    @php $totalCount += $product->count; @endphp
                </div>
            @endforeach
            <div class="row border py-3">
                <div class="col-md-6 border-right"></div>
                <div class="col-md-3 border-right">Общая сума: <b>{{ $totalSum }}</b></div>
                <div class="col-md-3">Общее кол-во: <b>{{ $totalCount }}</b></div>
            </div>

            <div class="text-center my-5">
                <p class="text-center"><b>Перенести заказ в статус:</b></p>
                <a href="{{ route('transfer-order-in-work', ['id' => $order->id_order]) }}" class="btn btn-success">В работе</a>
                <a href="{{ route('transfer-order-canceled', ['id' => $order->id_order]) }}" class="btn btn-danger">Отмененный</a>
                <a href="{{ route('transfer-order-completed', ['id' => $order->id_order]) }}" class="btn btn-primary">Выполнен</a>
            </div>

        </div>
    </div>
@endsection
