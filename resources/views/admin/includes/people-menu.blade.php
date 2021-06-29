<ul class="nav nav-pills nav-fill mb-3">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.people.index') ? 'active' : '' }}"
            href="{{ route('admin.people.index') }}">Список лиц</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.people.create') ? 'active' : '' }}"
            href="{{ route('admin.people.create') }}">Добавить в список</a>
    </li>
</ul>
