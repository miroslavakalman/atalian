@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="admin-title">Управление контентом</h2>
    <a href="{{ route('admin.content.create') }}" class="btn-admin btn-admin-primary">
        <i class="bi bi-plus"></i> Добавить контент
    </a>
</div>

<div class="data-table mb-4">
    <div class="table-header">
        <h5>Фильтры</h5>
    </div>
    <div class="p-4">
        <form method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control-admin" 
                       placeholder="Поиск по ключу, описанию..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="group" class="form-control-admin">
                    <option value="">Все группы</option>
                    @foreach($groups as $key => $label)
                        <option value="{{ $key }}" {{ request('group') == $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn-admin btn-admin-primary">
                    <i class="bi bi-funnel"></i> Фильтровать
                </button>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('admin.content.index') }}" class="btn-admin btn-admin-outline">
                    Сбросить
                </a>
            </div>
        </form>
    </div>
</div>

<form id="bulk-form" method="POST" action="{{ route('admin.content.bulk') }}">
    @csrf
    @method('POST')
    <input type="hidden" name="ids" id="bulk-ids">
    <input type="hidden" name="action" id="bulk-action">

    <div class="data-table">
        <div class="table-header">
            <div class="form-check mb-0">
                <input class="form-check-input" type="checkbox" id="select-all">
                <label class="form-check-label" for="select-all">Выбрать все</label>
            </div>
            
            <div>
                <button type="button" class="btn-admin btn-admin-outline btn-sm" 
                        onclick="submitBulkAction('delete')">
                    <i class="bi bi-trash"></i> Удалить выбранные
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th width="30"></th>
                        <th>Ключ</th>
                        <th>Группа</th>
                        <th>Описание</th>
                        <th>Русский</th>
                        <th>Английский</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contents as $content)
                        <tr>
                            <td>
                                <input class="form-check-input content-checkbox" type="checkbox" 
                                       value="{{ $content->id }}">
                            </td>
                            <td>
                                <strong>{{ $content->key }}</strong>
                                @if($content->order > 0)
                                    <br><small class="text-muted">Порядок: {{ $content->order }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $content->group_name }}
                                </span>
                            </td>
                            <td>{{ $content->description }}</td>
                            <td>
                                <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $content->value_ru }}
                                </div>
                            </td>
                            <td>
                                <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $content->value_en }}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.content.edit', $content) }}" 
                                   class="btn-admin btn-admin-outline btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.content.destroy', $content) }}" 
                                      method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-outline btn-sm text-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Контент не найден
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrapper">
            <div class="data-counter">
                Всего: {{ $contents->total() }}
            </div>
            {{ $contents->links() }}
        </div>
    </div>
</form>

<script>
function submitBulkAction(action) {
    const checkboxes = document.querySelectorAll('.content-checkbox:checked');
    if (checkboxes.length === 0) {
        alert('Выберите хотя бы один элемент');
        return;
    }
    
    if (action === 'delete' && !confirm('Удалить выбранные элементы?')) {
        return;
    }
    
    const ids = Array.from(checkboxes).map(cb => cb.value);
    document.getElementById('bulk-ids').value = JSON.stringify(ids);
    document.getElementById('bulk-action').value = action;
    document.getElementById('bulk-form').submit();
}

document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('select-all');
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            document.querySelectorAll('.content-checkbox').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    }
});
</script>
@endsection