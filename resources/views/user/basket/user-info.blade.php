<div class="container">

    @if(!empty($products))
        <div class="col-md-8 offset-2">
            <form action="{{ route('add-order') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Ваше имя</label>
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Ваше имя">
                </div>

                <div class="form-group">
                    <label for="name">Ваша фамилия</label>
                    <input value="{{ old('surname') }}" name="surname" type="text" class="form-control @error('surname') is-invalid @enderror" id="name" placeholder="Ваша фамилия">
                </div>

                <div class="form-group">
                    <label for="name">Номер мобильного</label>
                    <input value="{{ old('phone') }}" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="name" placeholder="Номер мобильного">
                </div>

                <div class="form-group">
                    <label for="email">Ваше email</label>
                    <input value="{{ old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Ваше email">
                </div>

                <div class="form-group">
                    <label for="delivery">Город доставки</label>
                    <input value="{{ old('delivery') }}" name="delivery" type="text" class="form-control @error('delivery') is-invalid @enderror" id="email" placeholder="Адресс доставки">
                </div>

                @foreach($products as $product)
                    <input type="hidden" name="id_product[]" value="{{ $product['idProduct'] }}">
                    <input type="hidden" name="id_size[]" value="{{ $product['idSize'] }}">
                    <input type="hidden" name="count[]" value="{{ $product['count'] }}">
                    <input type="hidden" name="price[]" value="{{ $product['price'] }}">
                    <input type="hidden" name="discount[]" value="{{ $product['discount'] }}">
                @endforeach

                <input type="submit" class="btn btn-primary" value="отправить">
            </form>
        </div>
    @endif
</div>
