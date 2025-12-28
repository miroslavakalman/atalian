@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Обращения с сайта</h2>
    <div>
        <a href="{{ route('admin.contact.export') }}" class="btn btn-outline-success btn-sm">
            <i class="bi bi-download"></i> Экспорт CSV
        </a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control form-control-sm" 
                       placeholder="Поиск по имени, email..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select form-select-sm">
                    <option value="">Все статусы</option>
                    @foreach($statuses as $key => $label)
                        <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="subject" class="form-select form-select-sm">
                    <option value="">Все темы</option>
                    @foreach($subjects as $key => $label)
                        <option value="{{ $key }}" {{ request('subject') == $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="date_from" class="form-control form-control-sm" 
                       value="{{ request('date_from') }}">
            </div>
            <div class="col-md-2">
                <input type="date" name="date_to" class="form-control form-control-sm" 
                       value="{{ request('date_to') }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="bi bi-funnel"></i>
                </button>
                <a href="{{ route('admin.contact.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-x"></i>
                </a>
            </div>
        </form>
    </div>
</div>

<form id="bulk-form" method="POST" action="{{ route('admin.contact.bulk') }}">
    @csrf
    @method('POST')
    <input type="hidden" name="ids" id="bulk-ids">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
                <input class="form-check-input" type="checkbox" id="select-all">
                <label class="form-check-label" for="select-all">Выбрать все</label>
            </div>
            
            <div class="d-flex gap-2">
                <select name="new_status" class="form-select form-select-sm" style="width: auto;">
                    <option value="">Изменить статус на...</option>
                    @foreach($statuses as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-sm btn-outline-primary" 
                        onclick="submitBulkAction('change_status')">
                    Применить
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" 
                        onclick="if(confirm('Удалить выбранные?')) submitBulkAction('delete')">
                    <i class="bi bi-trash"></i> Удалить
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="30"></th>
                        <th>Дата</th>
                        <th>Тема</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($submissions as $submission)
                        <tr class="{{ $submission->status === 'new' ? 'table-info' : '' }}">
                            <td>
                                <input class="form-check-input submission-checkbox" type="checkbox" 
                                       value="{{ $submission->id }}">
                            </td>
                            <td>
                                {{ $submission->created_at->format('d.m.Y H:i') }}
                                @if($submission->status === 'new')
                                    <span class="badge bg-danger">NEW</span>
                                @endif
                            </td>
                            <td>{{ $submission->subject_label }}</td>
                            <td>
                                <strong>{{ $submission->name }}</strong>
                                @if($submission->company)
                                    <br><small class="text-muted">{{ $submission->company }}</small>
                                @endif
                            </td>
                            <td>
                                <a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a>
                            </td>
                            <td>{{ $submission->phone ?? '-' }}</td>
                            <td>
                                <span class="badge 
                                    @if($submission->status === 'new') bg-info
                                    @elseif($submission->status === 'read') bg-secondary
                                    @elseif($submission->status === 'replied') bg-success
                                    @elseif($submission->status === 'closed') bg-dark
                                    @endif">
                                    {{ $submission->status_label }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.contact.show', $submission) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.contact.destroy', $submission) }}" 
                                      method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                Обращений не найдено
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="card-footer">
            {{ $submissions->links() }}
            <div class="text-muted">
                Всего: {{ $submissions->total() }}
                <span class="ms-3">Новых: {{ $submissions->where('status', 'new')->count() }}</span>
            </div>
        </div>
    </div>
</form>

<script>
function submitBulkAction(action) {
    const checkboxes = document.querySelectorAll('.submission-checkbox:checked');
    if (checkboxes.length === 0) {
        alert('Выберите хотя бы одно обращение');
        return;
    }
    
    const ids = Array.from(checkboxes).map(cb => cb.value);
    document.getElementById('bulk-ids').value = JSON.stringify(ids);
    
    const form = document.getElementById('bulk-form');
    const actionInput = document.createElement('input');
    actionInput.type = 'hidden';
    actionInput.name = 'action';
    actionInput.value = action;
    form.appendChild(actionInput);
    
    form.submit();
}

document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('select-all');
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            document.querySelectorAll('.submission-checkbox').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    }
});
</script>
@endsection