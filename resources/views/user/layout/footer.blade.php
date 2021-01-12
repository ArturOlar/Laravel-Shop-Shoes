<div class="container-fluid footer-theme">
    <div class="container">

        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="col-md-3 py-5">
                    <p class="pl-4">Для кого?</p>
                    <ul>
                        @foreach($genders as $gender)
                            <li>{{ $gender->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-3 py-5">
                    <p class="pl-4">Категории</p>
                    <ul>
                        @foreach($categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-3 py-5">
                    <p class="pl-4">Бренды</p>
                    <ul>
                        @foreach($brands as $brand)
                            <li>{{ $brand->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>

    </div>
</div>
