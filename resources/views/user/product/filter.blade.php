<div class="border-right">

    <form action="{{ route($route) }}" method="GET">

        <h3 class="text-center my-4">Фильтры</h3>
        {{--  фильтрация по цене  --}}
        <div class="pl-5 py-3 border-top">
            <h5 class="pb-2">Цена?</h5>
            <div class="form-group w-75">
                <input type="text" name="price_from" class="form-control" placeholder="от..." value="{{ request()->price_from }}">
            </div>
            <div class="form-group w-75">
                <input type="text" name="price_to" class="form-control" placeholder="до..." value="{{ request()->price_to }}">
            </div>
        </div>

        {{--  фильтрация по гендеру  --}}
        <div class="pl-5 py-3 border-top">
            <h5>Для кого?</h5>
            @foreach($genders as $gender)
                <div class="form-check">
                    <input name="id_gender[]" class="form-check-input" type="checkbox" value="{{ $gender->id_gender }}" id="{{ $gender->name }}"
                        @if(isset(request()->id_gender) && in_array($gender->id_gender, request()->id_gender)) checked @endif
                    >
                    <label class="form-check-label" for="{{ $gender->name }}">{{ $gender->name }}</label>
                </div>
            @endforeach
        </div>

        {{--  фильтрация по бренду  --}}
        <div class="pl-5 py-3 border-top">
            <h5>Бренд?</h5>
            @foreach($brands as $brand)
                <div class="form-check">
                    <input name="id_brand[]" class="form-check-input" type="checkbox" value="{{ $brand->id_brand }}" id="{{ $brand->name }}"
                           @if(isset(request()->id_brand) && in_array($brand->id_brand, request()->id_brand)) checked @endif
                    >
                    <label class="form-check-label" for="{{ $brand->name }}">{{ $brand->name }}</label>
                </div>
            @endforeach
        </div>

        {{--  фильтрация по категории  --}}
        <div class="pl-5 py-3 border-top">
            <h5>Категория?</h5>
            @foreach($categories as $category)
                <div class="form-check">
                    <input name="id_category[]" class="form-check-input" type="checkbox" value="{{ $category->id_category }}" id="{{ $category->name }}"
                           @if(isset(request()->id_category) && in_array($category->id_category, request()->id_category)) checked @endif
                    >
                    <label class="form-check-label" for="{{ $category->name }}">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>

        {{--  фильтрация по размеру  --}}
        <div class="text-center py-3 border-top">
            <div class="d-flex justify-content-around">
                <div class="mt-1">
                    <p class="text-center"><b>Размер?</b></p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Размер</button>
                    <ul class="dropdown-menu checkbox-menu allow-focus">
                        @foreach($sizes as $size)
                            <li class="ml-2">
                                <label>
                                    <input name="id_size[]" value="{{ $size->id_size }}" type="checkbox"
                                           @if(isset(request()->id_size) && in_array($size->id_size, request()->id_size)) checked @endif
                                    >
                                    {{ $size->size }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center pt-5 border-top">
            <button class="btn btn-success">Применить</button>
            <a href="{{ route($route) }}" class="btn btn-warning">Сбросить</a>
        </div>
    </form>

</div>
