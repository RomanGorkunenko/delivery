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
        <h1>Пользователи</h1>
        <ol class="breadcrumb">
            <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг пользователей</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>ФИО</th>
                            <th>Email</th>
                            <th>Пароль</th>
                            <th>Телефон</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    @foreach ($all as $users)
                    <tr>
                        <td>{{$users->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->open_password}}</td>
                        <td>{{$users->phone}}</td>
                        <td>
                            <a href="{{route('usersdel',$users->id)}}" class="fa fa-remove"></a>
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
