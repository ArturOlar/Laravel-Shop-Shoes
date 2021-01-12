@extends('admin.layout.layout')

@section('content')
    <div class="container">
        <div class="col-md-10 offset-1 my-5">

            <form action="{{ route('product.update', ['product' => $product->id_product]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <h5 class="text-center my-4">Редактировать товар</h5>

                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Id товара:</b></div>
                    <div class="col-md-6"><b>{{ $product->id_product }}</b></div>
                </div>

                <div class="row border py-3">
                    <div class="col-md-6 border-right form-group"><b>Наименование</b></div>
                    <div class="col-md-6">
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                    </div>
                </div>

                <div class="row border py-3 mt-3 form-group">
                    <div class="col-md-6 border-right"><b>Описание</b></div>
                    <div class="col-md-6">
                        <textarea class="form-control @error('desc') is-invalid @enderror" rows="6" name="desc">{{ old('desc', $product->desc) }}</textarea>
                    </div>
                </div>

                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Цена</b></div>
                    <div class="col-md-6">
                        <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                    </div>
                </div>

                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Скидка (у %)</b></div>
                    <div class="col-md-6">
                        <input name="discount" type="text" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $product->discount) }}">
                    </div>
                </div>

                {{--  для кого  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Для кого?</b></div>
                    <dib class="col-md-6">
                        <select name="id_gender" class="form-control">
                            @foreach($genders as $gender)
                                <option value="{{ $gender->id_gender }}"
                                        @if($product->gender->id_gender == $gender->id_gender) selected @endif
                                >{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </dib>
                </div>

                {{--  категория  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Категория?</b></div>
                    <dib class="col-md-6">
                        <select name="id_category" class="form-control" name="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id_category }}"
                                        @if($product->category->id_category == $category->id_category) selected @endif
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </dib>
                </div>

                {{--  категория  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Бренд?</b></div>
                    <dib class="col-md-6">
                        <select name="id_brand" class="form-control" name="">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id_brand }}"
                                        @if($product->brand->id_brand == $brand->id_brand) selected @endif
                                >{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </dib>
                </div>

                {{--  изображение  --}}
                <div class="row border py-3 form-group">
                    @foreach($images as $image)
                        <dib class="col-md-3">
                            <div class="row border">
                                <div class="col-md-10">
                                    <img class="w-100" src="{{ asset('/storage/' . $image->image) }}" alt="">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" onclick="deleteImage({{ $image->id_image }})" class="btn btn-danger">x</button>
                                </div>
                            </div>
                        </dib>
                    @endforeach
                </div>

                {{--  добавить изображение  --}}
                <div class="row border py-3 form-group">
                    <div class="col-md-6 border-right"><b>Добавить изображение</b></div>
                    <dib class="col-md-6">
                        <div class="custom-file">
                            <input name="images[]" type="file" class="custom-file-input" id="images" multiple>
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
                                        <input name="id_size[]" value="{{ $size->id_size }}" type="checkbox"
                                               @foreach($product->sizes as $productSizes)
                                               @if($productSizes->id_size == $size->id_size) checked @endif
                                            @endforeach
                                        >
                                        {{ $size->size }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </dib>
                </div>
                <div>
                    <small>При добавление нового размера, наличие в него будет равно 0. Что-бы изменить наличие:
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
