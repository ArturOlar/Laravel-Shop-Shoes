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
            @foreach($genders as $gender)
                <tr>
                    <td>{{ $gender->id_gender }}</td>
                    <td>{{ $gender->name }}</td>
                    <td class="table-td-product-links">
                        <a href="{{ route('gender.edit', ['gender' => $gender->id_gender ]) }}"
                           class="btn btn-warning">редактировать</a>
                        <a href="{{ route('gender.destroy', ['gender' => $gender->id_gender ]) }}" class="btn btn-danger">удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
