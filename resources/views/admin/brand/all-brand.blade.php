@extends('admin.layout.layout')

@section('content')
    <div class="container">

        <table class="table border-top mt5">
            <thead>
            <tr>
                <th scope="col">id категори</th>
                <th scope="col">наименование</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->id_brand }}</td>
                    <td>{{ $brand->name }}</td>
                    <td class="table-td-product-links">
                        <a href="{{ route('brand.edit', ['brand' => $brand->id_brand ]) }}"
                           class="btn btn-warning">редактировать</a>
                        <a href="{{ route('brand.destroy', ['brand' => $brand->id_brand ]) }}" class="btn btn-danger">удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
