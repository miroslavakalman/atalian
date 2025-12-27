@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="admin-title">Создание контента</h2>
    <a href="{{ route('admin.content.index') }}" class="btn-admin btn-admin-outline">
        <i class="bi bi-arrow-left"></i> Назад к списку
    </a>
</div>

<div class="data-table">
    <div class="table-header">
        <h5>Новый контент</h5>
    </div>
    <div class="p-4">
        <form method="POST" action="{{ route('admin.content.store') }}">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Ключ *</label>
                    <input type="text" name="key" class="form-control-admin" 
                           value="{{ old('key') }}" required>
                    <small class="text-muted">Уникальный идентификатор (например: about.title, career.hero_title)</small>
                    @error('key')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Группа *</label>
                    <select name="group" class="form-control-admin" required>
                        <option value="">Выберите группу</option>
                        @foreach($groups as $key => $label)
                            <option value="{{ $key }}" {{ old('group') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label">Описание</label>
                    <input type="text" name="description" class="form-control-admin" 
                           value="{{ old('description') }}">
                    <small class="text-muted">Описание для удобства поиска</small>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Значение (Русский)</label>
                    <textarea name="value_ru" class="form-control-admin" rows="4">{{ old('value_ru') }}</textarea>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Значение (Английский)</label>
                    <textarea name="value_en" class="form-control-admin" rows="4">{{ old('value_en') }}</textarea>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">Порядок</label>
                    <input type="number" name="order" class="form-control-admin" 
                           value="{{ old('order', 0) }}">
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn-admin btn-admin-primary">
                    <i class="bi bi-save"></i> Сохранить
                </button>
                <a href="{{ route('admin.content.index') }}" class="btn-admin btn-admin-outline">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>
@endsection