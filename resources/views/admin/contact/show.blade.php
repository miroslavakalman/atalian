@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Обращение #{{ $submission->id }}</h2>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Назад к списку
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Информация об обращении</h5>
                <span class="badge 
                    @if($submission->status === 'new') bg-info
                    @elseif($submission->status === 'read') bg-secondary
                    @elseif($submission->status === 'replied') bg-success
                    @elseif($submission->status === 'closed') bg-dark
                    @endif">
                    {{ $submission->status_label }}
                </span>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted">Дата обращения:</label>
                        <p>{{ $submission->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted">Тема:</label>
                        <p><strong>{{ $submission->subject_label }}</strong></p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted">Имя:</label>
                        <p class="fs-5">{{ $submission->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted">Email:</label>
                        <p>
                            <a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a>
                        </p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted">Телефон:</label>
                        <p>
                            @if($submission->phone)
                                <a href="tel:{{ $submission->phone }}">{{ $submission->phone }}</a>
                            @else
                                <span class="text-muted">Не указан</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted">Компания:</label>
                        <p>{{ $submission->company ?? 'Не указана' }}</p>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Сообщение:</label>
                    <div class="border rounded p-3 bg-light">
                        {{ nl2br(e($submission->message)) }}
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Согласия:</label>
                    <div>
                        <span class="badge bg-{{ $submission->consent_pd ? 'success' : 'danger' }}">
                            Обработка ПДн: {{ $submission->consent_pd ? 'Да' : 'Нет' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Действия</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.contact.update-status', $submission) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Изменить статус:</label>
                        <select name="status" class="form-select" required>
                            @foreach(App\Models\ContactSubmission::getStatuses() as $key => $label)
                                <option value="{{ $key }}" 
                                    {{ $submission->status == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Заметки:</label>
                        <textarea name="notes" class="form-control" rows="5" 
                                  placeholder="Внутренние заметки по обращению...">{{ old('notes', $submission->notes) }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="bi bi-save"></i> Сохранить изменения
                    </button>
                </form>
                
                <hr>
                
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $submission->email }}?subject=Ответ на ваше обращение #{{ $submission->id }}" 
                       class="btn btn-outline-primary">
                        <i class="bi bi-envelope"></i> Ответить на email
                    </a>
                    
                    @if($submission->phone)
                        <a href="tel:{{ $submission->phone }}" class="btn btn-outline-success">
                            <i class="bi bi-telephone"></i> Позвонить
                        </a>
                    @endif
                    
                    <form action="{{ route('admin.contact.destroy', $submission) }}" 
                          method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="bi bi-trash"></i> Удалить обращение
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Информация</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="bi bi-plus-circle text-success"></i>
                        <span class="ms-2">Создано: {{ $submission->created_at->format('d.m.Y H:i') }}</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-pencil text-primary"></i>
                        <span class="ms-2">Обновлено: {{ $submission->updated_at->format('d.m.Y H:i') }}</span>
                    </li>
                    @if($submission->notes)
                        <li class="mt-3">
                            <small class="text-muted">Заметки:</small>
                            <div class="border rounded p-2 mt-1 small bg-light">
                                {{ nl2br(e($submission->notes)) }}
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection