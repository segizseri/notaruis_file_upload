@extends('layouts.main')
@section('title', 'Загрузка файла')
@section('main_content')
    <div class="upload_section">
        <form class=upload_form" method="POST" enctype="multipart/form-data" action="{{ route('file.store') }}">
            @csrf
            <div class="upload_form_content">
                <div class="form_group">
                    <label for="title">Названия файла</label>
                    <input type="text" id="title" name="title">
                </div>

                <div class="form_group">
                    <label for="category_id">Выбрать категорию</label>
                    <select name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form_group">
                    <label for="folder_id">Выбрать папку</label>
                    <select name="folder_id" id="folder_id">
                        <option value="0">Добавить новую папку</option>
                        @foreach($folders as $folder)
                        <option selected value="{{$folder->id}}">{{$folder->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form_group">
                    <label for="file">Загрузить файл</label>
                    <input type="file" name="file">
                </div>
            </div>
            <div class="form_group">
                <label for="description">Описания</label>
                <textarea name="description" id="description" cols="30" rows="3"></textarea>
            </div>

                <button class="upload_submit" type="submit">Загрузить</button>
        </form>
    </div>
    <div class="table_section">
        <table class="upload_table">
            <thead class="upload_list_title">
            <tr>
                <th>Названия</th>
                <th>Категория</th>
                <th>Дата создании</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
            <tr class="upload_list_items">
                <td class="border-r">
                    <img src="https://cdn-icons-png.flaticon.com/512/4726/4726040.png" class="icon-24" alt="">
                    {{ $file->title }}
                </td>
                <td class="border-r">{{ $file->categorу }}</td>
                <td class="border-r">{{ $file->created_at }}</td>
                <td>
                    <a type="button" class="file_download" href="{{ route('file.destroy',  ['id' => $file->id]) }}">
                        Удалить
                    </a>
                    <a type="button" class="file_delete" href="{{ $file->path }}">
                        Скачать
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="table_footer">{{ $files->links() }}</div>
    </div>
{{--    <div class="files_section">--}}
{{--        @foreach($files as $file)--}}
{{--        <div class="file_card">--}}
{{--            <div class="card_left">--}}
{{--                <img src="https://cdn-icons-png.flaticon.com/512/4726/4726040.png" class="icon-40" alt="">--}}
{{--                {{ $file->folder->name }}--}}
{{--            </div>--}}
{{--            <div class="card_content">--}}
{{--                <div class="card_head">--}}
{{--                    <a href="" class="card_title">{{ $file->title }}</a>--}}
{{--                    <span class="card_date">--}}
{{--                        23.08.2022--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="card_body">--}}
{{--                    <p>{{ $file->description }}</p>--}}
{{--                    <div class="display-flex">--}}
{{--                        <a type="button" class="file_delete" href="{{ route('file.destroy',  ['id' => $file->id]) }}">--}}
{{--                            Удалить--}}
{{--                        </a>--}}
{{--                        <a type="button" class="file_download" href="{{ $file->path }}">--}}
{{--                            Скачать--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
@endsection
