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
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                        <li class="breadcrumb-item active">Редактирование поста {{$post->title}}</li>
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
                        <div class="w-25">
                            <img class="w-50" src="{{asset('storage/'.$post->prev_image)}}" alt="preview">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input  name="prev_image" type="file" class="custom-file-input" >
                                <label class="custom-file-label">Обновите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Обновить основное изображение</label>
                        <div class="w-25">
                            <img class="w-50" src="{{url('storage/'.$post->main_image)}}" alt="main">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input  name="main_image" type="file" class="custom-file-input" >
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
                                    {{$category->id==$post->category_id?'selected':''}}
                                >{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Выберите Тэги</label>
                        <select multiple  name="tag_id[]" class="form-control">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                    {{is_array($post->tags->pluck('id'))&&in_array($tag->id,$post->tags)?'selected':''}}
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
