@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление Поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Добавление</li>
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
                        <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                       value="{{old('title')}}">
                                @error('title')
                                <div class="text-danger">Это поле необходимо для запонения</div>
                                @enderror
                            </div>
                            <div class="form-grp">
                                <textarea id="summernote" name="content">
                                 {{old('content')}}
                                </textarea>
                                @error('content')
                                <div class="text-danger">Это поле необходимо для запонения</div>
                                @enderror
                            </div>

                            <div class="input-group w-50">
                                <label>Добавить превью</label>
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


                                @error('preview_image')
                                <div class="text-danger">Это поле необходимо для запонения</div>
                                @enderror
                            </div>

                            <div class="input-group w-50">
                                <label>Добавить главное изображение</label>
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
                                @error('main_image')
                                <div class="text-danger">Это поле необходимо для запонения</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mt-2">
                                <label>Выберите категорию</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <label>Выберите теги</label>
                                <select class="select2" multiple="multiple" name="tag_ids[]"
                                        data-placeholder="выберите теги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option {{is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected': ''}} value="{{$tag->id}}"
                                        >{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-grp mt-2">
                                <input type="submit" class="btn btn-primary" value="Добавить">
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
