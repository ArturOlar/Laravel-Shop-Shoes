@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">

        <div class="row mt-5">
            <div class="col-md-2">
                @include('user.product.filter')
            </div>

            <div class="col-md-10">
                <table class="table border-top">
                    <thead>
                    <tr>
                        <th scope="col">id товара</th>
                        <th scope="col">наименование</th>
                        <th scope="col">цена</th>
                        <th scope="col">скидка</th>
                        <th scope="col">для кого</th>
                        <th scope="col">категория</th>
                        <th scope="col">бренд</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id_product }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount }}%</td>
                            <td>{{ $product->gender->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td class="table-td-product-links">
                                <div class="row">
                                    <a href="{{ route('product.edit', ['product' => $product->id_product ]) }}" class="btn btn-warning">редактировать</a>
                                    <a href="{{ route('show-balance-product', ['id' => $product->id_product ]) }}" class="btn btn-primary">изменить наличие</a>
                                    <form action="{{ route('product.destroy', ['product' => $product->id_product ]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="удалить">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="my-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
