@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Просмотр отклика #{{ $submission->id }}</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Назад к списку
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Информация о кандидате</h5>
                <span class="badge status-{{ $submission->status }}">
                    {{ $submission->status_label }}
                </span>
            </div>
            <div class="card-body">
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
                        <label class="form-label text-muted">Вакансия:</label>
                        <p>{{ $submission->vacancy_name ?? 'Не указана' }}</p>
                    </div>
                </div>
                
                @if($submission->message)
                    <div class="mb-3">
                        <label class="form-label text-muted">Сообщение:</label>
                        <div class="border rounded p-3 bg-light">
                            {{ $submission->message }}
                        </div>
                    </div>
                @endif
                
                <div class="mb-3">
                    <label class="form-label text-muted">Согласия:</label>
                    <div>
                        <span class="badge bg-{{ $submission->consent_pd ? 'success' : 'danger' }}">
                            Обработка ПДн: {{ $submission->consent_pd ? 'Да' : 'Нет' }}
                        </span>
                        <span class="badge bg-{{ $submission->consent_marketing ? 'success' : 'secondary' }}">
                            Рассылка: {{ $submission->consent_marketing ? 'Да' : 'Нет' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Резюме</h5>
            </div>
            <div class="card-body">
                @if($submission->resume_path)
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                            <i class="bi bi-file-earmark-text fs-1 text-primary"></i>
                            <div class="ms-3 d-inline-block">
                                <div>Размер: {{ $submission->resume_size }}</div>
                                <div class="text-muted small">
                                    Загружено: {{ $submission->created_at->format('d.m.Y H:i') }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.career.download', $submission) }}" 
                               class="btn btn-primary">
                                <i class="bi bi-download"></i> Скачать
                            </a>
                        </div>
                    </div>
                @else
                    <p class="text-muted">Резюме не загружено</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Действия</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.career.update-status', $submission) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Изменить статус:</label>
                        <select name="status" class="form-select" required>
                            @foreach(App\Models\CareerSubmission::getStatuses() as $key => $label)
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
                                  placeholder="Внутренние заметки по кандидату...">{{ old('notes', $submission->notes) }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save"></i> Сохранить изменения
                    </button>
                </form>
                
                <hr>
                
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $submission->email }}?subject=Ответ на вакансию" 
                       class="btn btn-outline-primary">
                        <i class="bi bi-envelope"></i> Написать email
                    </a>
                    
                    @if($submission->phone)
                        <a href="tel:{{ $submission->phone }}" class="btn btn-outline-success">
                            <i class="bi bi-telephone"></i> Позвонить
                        </a>
                    @endif
                    
                    <form action="{{ route('admin.career.destroy', $submission) }}" 
                          method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="bi bi-trash"></i> Удалить заявку
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">История</h5>
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
                                {{ $submission->notes }}
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 