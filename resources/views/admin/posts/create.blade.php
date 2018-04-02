@extends('admin.layout') @section('content')
<div class="content-wrapper">
    <form method="POST" action="{{route('create')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <section class="content-header">
            <h1>
                Добавить продукт
            </h1>
        </section>

        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем продукт</h3>

                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>

                        <div class="form-group">
                            <label>Категория</label>
                            <div>
                                <select name="category">
		                            <option value="Салаты">Салаты</option>
		                            <option value="Пицца">Пицца</option>
		                            <option value="Суши">Суши</option>
		                            <option value="Закуски">Закуски</option>
		                            <option value="Десерты">Десерты</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="weight">Вес</label>
                            <input type="text" id="weight" name="weight">
                        </div>

                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input type="number" id="price" name="price">
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Описание</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <input type="submit" name='enter' value='Добавить' id='btlAuth' class="btn btn-success pull-right">
            </div>
        </section>
    </form>
</div>
@endsection
