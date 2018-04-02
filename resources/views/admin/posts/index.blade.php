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
    .col{
        width: 9%;
    }

</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Продукты</h1>
        <ol class="breadcrumb">
            <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг продуктов</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('create')}}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Описание</th>
                            <th class='col'>Вес</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $products)
                        <tr>
                            <td>{{$products->id}}</td>
                            <td>{{$products->title}}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->description}}</td>
                            <td>{{$products->weight}}</td>
                            <td>{{$products->price}}</td>
                            <td>
                                <a href="{{route('edit',$products->id)}}" class="fa fa-pencil"></a>
                                <a href="{{route('del',$products->id)}}" class="fa fa-remove"></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{$all->links()}}
            </div>
        </div>
    </section>
</div>
@endsection
