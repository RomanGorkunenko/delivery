<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/main.css">
    <style>
        .top-right {
            position: absolute;
            right: 5%;
            top: 2%;
        }

        .links>a {
            color: #636b6f;
            padding: 0 5px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .main-content {
            margin-top: 50px;
        }

        article {
            width: 49%;
            float: left;
            margin-left: 10px;
        }


        .entry-header h2 a,
        .entry-header h6 a {
            text-decoration: none;
            letter-spacing: 0.5px;
        }

        h6 {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/showcart') }}">Корзина<span class="badge">{{$count}}</span></a> @if (Auth::check()) @if (Auth::user()->is_admin)
            <a href="{{route('admin')}}">{{Auth::user()->name}}</a> @else
            <a href="{{route('user')}}">{{Auth::user()->name}}</a>
            <a href='{{route('logout')}}'>Выход</a> @endif @else
            <a href="{{ url('/login') }}">Авторизация</a>
            <a href="{{ url('/register') }}">Регистрация</a> @endif
        </div>
        @endif
    </div>
    <div class="content">
        <div class="row">
            <div class="border-lines-container">
                <h5 class="border-lines">Салаты</h5>
            </div>
            @foreach ($all as $products) @if ($products->category == 'Салаты')
            <div class="col-md-4">
                <div class="product-preview">
                    <div class="product-photo">
                        <div class="product-price">
                            {{$products->price}} <sub>грн</sub>
                        </div>
                        <img alt="product" src="../uploads/{{$products->filename}}">
                    </div>
                    <h3 class="product-title">{{$products->title}}</h3>
                    <p class="product-info">
                        <?php echo "$products->description" ?>
                    </p>
                    <h6 class="text-capitalize">Вес: {{$products->weight}}</h6>
                    <form action="/add" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="productsId" value="{{$products->id}}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="cart-trigger button-clean button-text-small">Добавить в корзину</button>
                    </form>
                </div>
            </div>
            @endif @endforeach
        </div>

        <div class="row">
            <div class="border-lines-container">
                <h5 class="border-lines">Закуски</h5>
            </div>
            @foreach ($all as $products) @if ($products->category == 'Закуски')
            <div class="col-md-4">
                <div class="product-preview">
                    <div class="product-photo">
                        <div class="product-price">
                            {{$products->price}} <sub>грн</sub>
                        </div>
                        <img alt="product" src="../uploads/{{$products->filename}}">
                    </div>
                    <h3 class="product-title">{{$products->title}}</h3>
                    <p class="product-info">
                        <?php echo "$products->description" ?>
                    </p>
                    <h6 class="text-capitalize">Вес: {{$products->weight}}</h6>
                    <form action="/add" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="productsId" value="{{$products->id}}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="cart-trigger button-clean button-text-small">Добавить в корзину</button>
                    </form>
                </div>
            </div>
            @endif @endforeach
        </div>

        <div class="row">
            <div class="border-lines-container">
                <h5 class="border-lines">Пицца</h5>
            </div>
            @foreach ($all as $products) @if ($products->category == 'Пицца')
            <div class="col-md-4">
                <div class="product-preview">
                    <div class="product-photo">
                        <div class="product-price">
                            {{$products->price}} <sub>грн</sub>
                        </div>
                        <img alt="product" src="../uploads/{{$products->filename}}">
                    </div>
                    <h3 class="product-title">{{$products->title}}</h3>
                    <p class="product-info">
                        <?php echo "$products->description" ?>
                    </p>
                    <h6 class="text-capitalize">Вес: {{$products->weight}}</h6>
                    <form action="/add" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="productsId" value="{{$products->id}}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="cart-trigger button-clean button-text-small">Добавить в корзину</button>
                    </form>
                </div>
            </div>
            @endif @endforeach
        </div>

        <div class="row">
            <div class="border-lines-container">
                <h5 class="border-lines">Суши</h5>
            </div>
            @foreach ($all as $products) @if ($products->category == 'Суши')
            <div class="col-md-4">
                <div class="product-preview">
                    <div class="product-photo">
                        <div class="product-price">
                            {{$products->price}} <sub>грн</sub>
                        </div>
                        <img alt="product" src="../uploads/{{$products->filename}}">
                    </div>
                    <h3 class="product-title">{{$products->title}}</h3>
                    <p class="product-info">
                        <?php echo "$products->description" ?>
                    </p>
                    <h6 class="text-capitalize">Вес: {{$products->weight}}</h6>
                    <form action="/add" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="productsId" value="{{$products->id}}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="cart-trigger button-clean button-text-small">Добавить в корзину</button>
                    </form>
                </div>
            </div>
            @endif @endforeach
        </div>

        <div class="row">
            <div class="border-lines-container">
                <h5 class="border-lines">Десерты</h5>
            </div>
            @foreach ($all as $products) @if ($products->category == 'Десерты')
            <div class="col-md-4">
                <div class="product-preview">
                    <div class="product-photo">
                        <div class="product-price">
                            {{$products->price}} <sub>грн</sub>
                        </div>
                        <img alt="product" src="../uploads/{{$products->filename}}">
                    </div>
                    <h3 class="product-title">{{$products->title}}</h3>
                    <p class="product-info">
                        <?php echo "$products->description" ?>
                    </p>
                    <h6 class="text-capitalize">Вес: {{$products->weight}}</h6>
                    <form action="/add" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="productsId" value="{{$products->id}}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="cart-trigger button-clean button-text-small">Добавить в корзину</button>
                    </form>
                </div>
            </div>
            @endif @endforeach
        </div>
    </div>
    <script scr="/js/main.js"></script>
</body>
</html>
