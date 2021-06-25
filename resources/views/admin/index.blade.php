@extends('layouts.main')

@section('seo.title', 'Админпанель')

@section('content')

    <div class="container py-3">

        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.people.index') }}">Список лиц</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.people.create') }}">Добавить в список</a>
            </li>
        </ul>

        {{-- <form method="POST" action="/profile">
        @csrf

        <label for="title">Post Title</label>
        <input id="title" type="text" class="@error('title') is-invalid @enderror">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        </form> --}}

    </div>

@endsection
