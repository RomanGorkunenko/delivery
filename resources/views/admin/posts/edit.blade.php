@extends('admin.layout') @section('content')
<div class="content-wrapper">
    <form method="POST" action="{{route('edit',$id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <section class="content-header">
            <h1>Изменить продукт: <small>{{$title}}</small></h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем продукт</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title1" value="{{$title}}">
                        </div>
                        <div class="form-group">
                            <label for="InputFile">Лицевая картинка</label>
                            <input type="file" id="InputFile" name="images">
                        </div>

                        <div class="form-group">
                            <label>Категория</label>
                            <div>
                                <select name="category1">
		                            <option <?php if($category=="Салаты") echo 'Selected'; ?> value="Салаты">Салаты</option>
		                            <option <?php if($category=="Пицца") echo 'Selected'; ?> value="Пицца">Пицца</option>
		                            <option <?php if($category=="Суши") echo 'Selected'; ?> value="Суши">Суши</option>
		                            <option <?php if($category=="Закуски") echo 'Selected'; ?> value="Закуски">Закуски</option>
		                            <option <?php if($category=="Десерты") echo 'Selected'; ?> value="Десерты">Десерты</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="weight1">Вес</label>
                            <input type="text" id="weight1" name="weight1" value="{{$weight}}">
                        </div>
                        <div class="form-group">
                            <label for="price1">Цена</label>
                            <input type="number" id="price1" name="price1" value="{{$price}}">
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Описание</label>
                        <textarea name="description1" id="" cols="30" rows="10" class="form-control">{{$description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <input type="submit" name='edit' value='Изменить' id='btlAuth' class="btn btn-success pull-right">
            </div>
        </section>
    </form>
</div>
@endsection
