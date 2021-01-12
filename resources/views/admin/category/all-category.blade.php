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
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id_category }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="table-td-product-links">
                        <a href="{{ route('category.edit', ['category' => $category->id_category ]) }}"
                           class="btn btn-warning">редактировать</a>
                        <a href="{{ route('category.destroy', ['category' => $category->id_category ]) }}" class="btn btn-danger">удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
