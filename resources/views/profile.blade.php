<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        button {
            color: black;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Личный кабинет</h2>
        <h3>Мои заказы:</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Название продукта</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th>Адрес доставки</th>
                    <th>Телефон</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $user)
                <tr>
                    <td>{{$user->productId}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->price}}</td>
                    <td>{{$user->qty}}</td>
                    <td>{{$user->subtotal}}</td>
                    <td>{{$user->adres}}</td>
                    <td>{{$user->phone}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href='{{route('welcome')}}'><button>Назад</button></a>
    </div>
</body>

</html>
