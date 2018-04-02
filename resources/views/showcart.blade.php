<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #map-canvas {
            border: 1px solid black;
            height: 400px;
            border-radius: 4px;
        }

        input[type=number] {
            width: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5%;
        }

        button {
            margin-top: 2%;
            color: black;
        }

        .col1 {
            width: 5% !important;
        }

    </style>
</head>

<body>
    @if (Session::has('cart'))
    <h2>Корзина</h2>
    <div class="google col-md-6 col-xs-12">
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyC4KR86Ff6XGXYQr0GJPfqh1mMc8qD7hoM&sensor=false"></script>
        <div id="map-canvas"></div>
        <a href='/'><button>Назад</button></a>
    </div>
    <div class="container col-md-6 col-xs-12 ">
        <form action="{{route('showcart')}}" method="post">
            <p><label>Введите свой адрес:</label></p>
            <p><input type="text" name="d" placeholder="Улица"required><?php if(isset($_POST['submit'])) echo (' Улица: '.strip_tags(trim($_POST['d']))) ?>
            </p>
            <p><input type="text" name="o" placeholder="Номер квартиры" required><?php if(isset($_POST['submit'])) echo (' Квартира: '.strip_tags(trim($_POST['o']))) ?>
            </p>
            <p><input type="submit" value="Рассчитать доставку" name="submit"></p>
        </form>
        <?php
            if(isset($_POST['submit'])){
            $q=(strip_tags(trim($_POST['d']).'-'.($_POST['o'])));
            $origin = urlencode('вулиця Соціалістична 57, Краматорськ, Донецька область, Украина, 84300'); $destination = urlencode(strip_tags(trim($_POST['d'])).', Краматорськ, Донецька область, Украина, 84300');
            $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&language=ru&origins=".$origin."&destinations=".$destination."&key=AIzaSyC4KR86Ff6XGXYQr0GJPfqh1mMc8qD7hoM");
            $a=file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?components=route:".$origin."&key=AIzaSyC4KR86Ff6XGXYQr0GJPfqh1mMc8qD7hoM"); 
            $d= json_decode($a);
            $lat=($d->results[0]->geometry->location->lat);
            $lng=($d->results[0]->geometry->location->lng);
            $a1=file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?components=route:".$destination."&key=AIzaSyC4KR86Ff6XGXYQr0GJPfqh1mMc8qD7hoM"); 
            $d1= json_decode($a1);
            $lat1=($d1->results[0]->geometry->location->lat);
            $lng1=($d1->results[0]->geometry->location->lng);  
            $data = json_decode($api);
            $km = (int)$data->rows[0]->elements[0]->distance->value / 1000;
            $de = ceil(25+$km*7);
        ?>
            <script>
                var map;
                function initialize() {
                    var mapOptions = {
                        zoom: 8,
                        center: new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>)
                    };
                    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                    var directionsDisplay = new google.maps.DirectionsRenderer();
                    var directionsService = new google.maps.DirectionsService();
                    directionsDisplay.setMap(map);
                    directionsDisplay.setOptions({
                        suppressMarkers: true,
                        suppressInfoWindows: true
                    });

                    var start_point = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>);
                    var end_point = new google.maps.LatLng(<?php echo $lat1 ?>, <?php echo $lng1 ?>);

                    var marker = new google.maps.Marker({
                        position: start_point,
                        map: map
                    });

                    var marker = new google.maps.Marker({
                        position: end_point,
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map, this);
                    });

                    var request = {
                        origin: start_point,
                        destination: end_point,
                        travelMode: google.maps.TravelMode.DRIVING,
                        unitSystem: google.maps.UnitSystem.METRIC,
                        provideRouteAlternatives: true,
                        avoidHighways: false,
                        avoidTolls: true
                    };
                    
                    directionsService.route(request, function(result, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            directionsDisplay.setDirections(result);
                            var routes = result.routes;
                            var leg = routes[0].legs;
                            var lenght = leg[0].distance.text;
                            infowindow = new google.maps.InfoWindow({
                                content: 'Расстояние: ' + lenght
                            });
                            infowindow.open(map, marker);
                        }
                    });
                }
                google.maps.event.addDomListener(window, 'load', initialize);

            </script>
            <?php } ?> {{Session::get('msg')}}
            <p></p>
            <table class="table">
                <thead>
                    <tr>
                        <?php $i=1; ?>
                        <th class="col1">N п/п</th>
                        <th>Удалить</th>
                        <th class="col2">Название</th>
                        <th class="col3">Цена</th>
                        <th class="col2">Количество</th>
                        <th class="col3">Сумма</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?> @foreach($cartProducts as $cart)
                    <tr>
                        <td>{{$i++}}</td>
                        <td><a href="{{url('/delete/'.$cart->rowId)}}">Удалить</a></td>
                        <td>{{$cart->name}}</td>
                        <td>{{$cart->price}} грн</td>
                        <td>
                            <form action="/update" method="POST">
                                {{ csrf_field() }}
                                <input type="number" value="{{$cart->qty}}" min="1" name="qty">
                                <input type="hidden" value="{{$cart->rowId}}" name="rowId">
                                <input type="submit" value="Ok">
                            </form>
                        </td>
                        <?php $subtotal = $cart->qty*$cart->price; 
                            $price = $cart->price?>
                        <td>{{$subtotal}} грн</td>
                    </tr>
                    <?php $total=$total+$subtotal;?> @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right">Доставка:</td>
                        <?php if(isset($_POST['submit'])) {echo ("<td>$de грн</td>");} else echo("<td></td>") ?>
                    </tr>
                    <tr>
                        <td>
                            <form action="/save" method="POST">
                                {{ csrf_field() }}
                                <input name="adres" type="hidden" value="<?php if(isset($_POST['submit'])) echo ($q); ?>">
                                <input id="checkout" type="submit" value="Оформление заказа">
                            </form>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right">Общая сумма:</td>
                        <?php if(isset($_POST['submit'])){$full=$total+$de; echo ("<td> $full грн</td>");} else echo("<td>$total грн</td>");?>
                    </tr>
                </tbody>
            </table>
    </div>
    @endif
</body>

</html>
