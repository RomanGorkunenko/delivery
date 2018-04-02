@extends('admin.layout') @section('content')
<style>
    ul {
        list-style: none;
        float: left;
        padding-right: 10px;
    }

    .pagination li {
        float: left;
        padding: 0 10px;
        line-height: 34px;
    }

</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Заказы</h1>
        <ol class="breadcrumb">
            <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard"></i>Home</a></li>
        </ol>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг заказов</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Номер заказа</th>
                            <th>Название продукта</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                            <th>ФИО</th>
                            <th>Адрес доставки</th>
                            <th>Телефон</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    @foreach ($all as $cart)
                    <tr>
                        <td>{{$cart->id}}</td>
                        <td>{{$cart->productId}}</td>
                        <td>{{$cart->name}}</td>
                        <td>{{$cart->price}}</td>
                        <td>{{$cart->qty}}</td>
                        <td>{{$cart->subtotal}}</td>
                        <td>{{$cart->users->name}}</td>
                        <td>{{$cart->adres}}</td>
                        <td>{{$cart->phone}}</td>
                        <td>
                            <a href="{{route('orderdel',$cart->id)}}" class="fa fa-remove"></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{$all->links()}}
            </div>
        </div>
    </section>
</div>
@endsection
