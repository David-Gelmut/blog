@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">  Редактирование поста {{$post->title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                <form action="{{route('admin.post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input value="{{$post->title}}" type="text" class="form-control" name="title"  placeholder="Название поста">
                        @error('title')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea  style="height: 200px;width:400px" name="content" class="form-control">{{$post->content}}</textarea>
                        @error('content')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Обновить превью</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input value="{{$post->prev_image}}" name="prev_image" type="file" class="custom-file-input" >
                                <label class="custom-file-label">Обновите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Обновить основное изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input value="{{$post->main_image}}" name="main_image" type="file" class="custom-file-input" >
                                <label class="custom-file-label">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
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
                    </div>
                    <div class="form-group">
                        <label>Выберите Тэги</label>
                        <select multiple  name="tag_id[]" class="form-control">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                    {{$tag->id==old('$tag_id')?'selected':''}}
                                >{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Обновить">
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
