@extends('admin.layout.layout')

@section('content')
    <div class="container">
        <div class="col-md-10 offset-1 my-5">

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h5 class="text-center my-4">Создать товар</h5>

                <div class="row border py-3">
                    <div class="col-md-6 border-right form-group"><b>Наименование</b></div>
                    <div class="col-md-6">
                        <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="">
                    </div>
                </div>

                <div class="row border py-3 mt-3 form-group">
                    <div class="col-md-6 border-right"><b>Описание</b></div>
                    <div class="col-md-6">
                        <textarea class="form-control @error('desc') is-invalid @enderror" rows="6" name="desc">{{ old('desc') }}</textarea>
                    </div>
                </div>

                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Цена</b></div>
                    <div class="col-md-6">
                        <input value="{{ old('price') }}" name="price" type="text" class="form-control @error('price') is-invalid @enderror">
                    </div>
                </div>

                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Скидка (у %)</b></div>
                    <div class="col-md-6">
                        <input value="{{ old('discount') }}" name="discount" type="text" class="form-control @error('discount') is-invalid @enderror" value="">
                    </div>
                </div>

                {{--  для кого  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Для кого?</b></div>
                    <dib class="col-md-6">
                        <select @error('id_gender') is-invalid @enderror value="{{ old('id_gender') }}" name="id_gender" class="form-control">
                            @foreach($genders as $gender)
                                <option value="{{ $gender->id_gender }}">{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </dib>
                </div>

                {{--  категория  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Категория?</b></div>
                    <dib class="col-md-6">
                        <select value="{{ old('id_category') }}" name="id_category" class="form-control @error('id_category') is-invalid @enderror">
                            @foreach($categories as $category)
                                <option value="{{ $category->id_category }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </dib>
                </div>

                {{--  категория  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Бренд?</b></div>
                    <dib class="col-md-6">
                        <select value="{{ old('id_brand') }}" name="id_brand" class="form-control @error('id_brand') is-invalid @enderror" name="">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id_brand }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </dib>
                </div>

                {{--  добавить изображение  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Фото</b></div>
                    <dib class="col-md-6">
                        <div class="custom-file">
                            <input value="{{ old('images') }}" name="images[]" type="file" class="custom-file-input  @error('images') is-invalid @enderror" id="images" multiple>
                            <label class="custom-file-label" for="images">Выберете изображение</label>
                        </div>
                    </dib>
                </div>

                {{--  добавить размер  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Добавить размер</b></div>
                    <dib class="col-md-6 text-center">
                        <button type="button" class="btn btn-primary dropdown-toggle w-50" data-toggle="dropdown">Размеры</button>
                        <ul class="dropdown-menu checkbox-menu allow-focus">
                            @foreach($sizes as $size)
                                <li class="ml-2">
                                    <label>
                                        <input value="{{ $size->id_size }}" name="id_size[]" type="checkbox"> {{ $size->size }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </dib>
                </div>
                <div>
                    <small>При добавление размера, наличие в товара буде равно 0. Что-бы изменить наличие для созданого товара:
                        <br>
                        - перейдите в раздел "все товары"
                        <br>
                        - найдите новый созданный товар
                        <br>
                        - нажмите на кнопку "изменить наличие"
                    </small>
                </div>

                <div class="text-center my-5">
                    <input type="submit" class="btn btn-success" value="Редактировать">
                </div>
            </form>

        </div>
    </div>
@endsection
