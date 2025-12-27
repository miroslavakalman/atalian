@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Дашборд</h2>
    <div class="text-muted">
        Последнее обновление: {{ now()->format('d.m.Y H:i') }}
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Всего откликов</h5>
                <h2>{{ $stats['total'] }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Новые</h5>
                <h2>{{ $stats['new'] }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Приглашены</h5>
                <h2>{{ $stats['invited'] }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">За неделю</h5>
                <h2>{{ $stats['last_week'] }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Последние отклики</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Вакансия</th>
                            <th>Статус</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentSubmissions as $submission)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.career.show', $submission) }}">
                                        {{ $submission->name }}
                                    </a>
                                </td>
                                <td>{{ $submission->email }}</td>
                                <td>{{ $submission->vacancy_name ?? '-' }}</td>
                                <td>
                                    <span class="badge status-{{ $submission->status }}">
                                        {{ $submission->status_label }}
                                    </span>
                                </td>
                                <td>{{ $submission->created_at->format('d.m.Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    Нет откликов
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Быстрые действия</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.career.export') }}" class="btn btn-outline-success">
                        <i class="bi bi-download"></i> Экспорт в CSV
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-globe"></i> Перейти на сайт
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Статистика по статусам</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="badge bg-primary">Всего</span>
                        <span class="float-end">{{ $stats['total'] }}</span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-info">Новые</span>
                        <span class="float-end">{{ $stats['new'] }}</span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-secondary">Рассмотрены</span>
                        <span class="float-end">{{ $stats['reviewed'] }}</span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-success">Приглашены</span>
                        <span class="float-end">{{ $stats['invited'] }}</span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-danger">Отклонены</span>
                        <span class="float-end">{{ $stats['rejected'] }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection