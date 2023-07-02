@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">  Добавление поста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                        <li class="breadcrumb-item active">Добавление поста</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{old('title')}}" name="title"  placeholder="Название поста">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <textarea style="height: 200px;width:400px" class="form-control" name="content" >{{old('content')}}</textarea>
                        @error('content')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Добавить превью</label>

                        <div class="input-group">
                            <div class="custom-file">
                                <input value="{{old('prev_image')}}" name="prev_image" type="file" class="custom-file-input" >
                                <label class="custom-file-label">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                        @error('prev_image')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Добавить основное изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input value="{{old('main_image')}}" name="main_image" type="file" class="custom-file-input" >
                                <label class="custom-file-label">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Выберите категорию</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                {{$category->id==old('$category_id')?'selected':''}}
                                >{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Выберите Тэги</label>
                        <select multiple  name="tag_id[]" class="form-control" required>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
