@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование Поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Редактирование</li>
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
                    <div class="col-12">
                        <form action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                @error('title')
                                <div class="text-danger">Это поле необходимо для запонения</div>
                                @enderror
                            </div>
                            <div class="form-grp">
                                <textarea id="summernote" name="content">
                                    {{$post->content}}
                                </textarea>
                                @error('content')
                                <div class="text-danger">Это поле необходимо для запонения</div>
                                @enderror
                            </div>
                            <label>Добавить превью</label>
                            <div class="input-group w-50 ">
                                <div class="w-25 ">
                                    <img src="{{url('storage/' . $post->preview_image)}}" alt="preview_image"
                                         class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите
                                            изображение </label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <label>Добавить главное изображение</label>
                            <div class="input-group w-50">

                                <div class="w-50">
                                    <img src="{{url('storage/'.$post->main_image)}}" alt="main_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите
                                            изображение </label>

                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group w-25 mt-2">
                                <label>Выберите категорию</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <label>Выберите теги</label>
                                <select class="select2" multiple="multiple" name="tag_ids[]"
                                        data-placeholder="выберите теги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray())? 'selected': ''}} value="{{$tag->id}}"
                                        >{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-grp mt-2">
                                <input type="submit" class="btn btn-primary" value="Редактировать">
                            </div>

                        </form>

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
