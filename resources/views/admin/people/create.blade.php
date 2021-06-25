@extends('layouts.main')

@section('seo.title', 'Админпанель - Добавление пользователя')

@section('content')

    <div class="container py-3">

        <ul class="nav nav-pills nav-fill mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.people.index') }}">Список лиц</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.people.create') }}">Добавить в список</a>
            </li>
        </ul>

        <style>
          form label {
            font-size: .8rem;
          }
        </style>

        <form method="POST" action="{{ route('admin.people.store') }}">
          @csrf
          <div class="row g-2">
            <div class="col-12 col-md-4">
              <label for="Lastname" class="form-label">Фамилия:</label>
              <input type="text" class="form-control form-control-sm @error('Lastname') is-invalid @enderror" id="Lastname" name="Lastname" placeholder="Фамилия" value="{{ old('Lastname') }}" required>
              @error('Lastname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-12 col-md-4">
              <label for="FirstName" class="form-label">Имя:</label>
              <input type="text" class="form-control form-control-sm @error('FirstName') is-invalid @enderror" id="FirstName" name="FirstName" placeholder="Имя" value="{{ old('FirstName') }}" required>
              @error('FirstName')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-12 col-md-4">
              <label for="Secondname" class="form-label">Отчество:</label>
              <input type="text" class="form-control form-control-sm @error('Secondname') is-invalid @enderror" id="Secondname" name="Secondname" placeholder="Отчество" value="{{ old('Secondname') }}" required>
              @error('Secondname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-12 col-md-8">
              <label for="Debt" class="form-label">Долг:</label>
              <input type="number" class="form-control form-control-sm @error('Debt') is-invalid @enderror" id="Debt" name="Debt" value="0" step="0.01" min="0" placeholder="Долг" value="{{ old('Debt') }}" required>
              @error('Debt')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-12 col-md-4 align-self-end">
              <button type="submit" class="btn btn-sm btn-primary w-100">Отправить</button>
            </div>
          </div>
        </form>

    </div>

@endsection
