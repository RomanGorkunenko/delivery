@extends('admin.layout') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Привет! Это админка
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Главная страница</h3>
            </div>
            <div class="box-body">
                <p>Админка сайта по доставке еды содержит:</p>
                <p>- страницу на которой выводятся краткая информация о всех продуктах,</p>
                <p>- страницу добавления продуктов</p>
                <p>- страницу редактирования продуктов</p>
                <p>- удаление продуктов</p>
                <p>- информацию о заказах</p>
                <p>- информацию о пользователях</p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection
